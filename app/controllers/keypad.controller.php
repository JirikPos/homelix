<?php
class KeypadController
{
    private KeypadEntry  $entryModel;

    public function __construct(KeypadEntry $entryModel)
    {
        $this->entryModel   = $entryModel;
    }

    // keypad entries
    public function createEntry(): void
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
        $id = $this->entryModel->create(
            (int)$input['keypad_id'],
            (int)$input['code']
        );
        echo json_encode(['id' => $id]);
    }
}
