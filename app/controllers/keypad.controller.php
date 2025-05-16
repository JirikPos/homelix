<?php
class KeypadController
{
    private KeypadEntry $entryModel;

    public function __construct(KeypadEntry $entryModel)
    {
        $this->entryModel = $entryModel;
    }

    public function createEntry(): void
    {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;

        if (!isset($input['code'])) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => 'Missing code'
            ]);
            return;
        }

        try {
            $id = $this->entryModel->create((int)$input['code']);
            echo json_encode([
                'success' => true,
                'id' => $id
            ]);
        } catch (Throwable $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}
