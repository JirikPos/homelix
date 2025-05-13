<?php
class KeypadController
{
    private Keypad       $keypadModel;
    private KeypadEntry  $entryModel;

    public function __construct(Keypad $keypadModel, KeypadEntry $entryModel)
    {
        $this->keypadModel  = $keypadModel;
        $this->entryModel   = $entryModel;
    }

    // keypad
    public function listKeypads(): void
    {
        header('Content-Type: application/json');
        echo json_encode($this->keypadModel->getAll());
    }

    public function getKeypad(): void
    {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->keypadModel->getById($id);
        http_response_code($item ? 200 : 404);
        echo json_encode($item);
    }

    public function createKeypad(): void
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
        $id = $this->keypadModel->create($input['name']);
        echo json_encode(['id' => $id]);
    }

    public function updateKeypad(): void
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
        $success = $this->keypadModel->update(
            (int)$input['id'],
            $input['name']
        );
        echo json_encode(['success' => $success]);
    }

    public function deleteKeypad(): void
    {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);
        $success = $this->keypadModel->delete($id);
        echo json_encode(['success' => $success]);
    }

    // keypad entries
    public function listEntries(): void
    {
        header('Content-Type: application/json');
        echo json_encode($this->entryModel->getAll());
    }

    public function getEntry(): void
    {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->entryModel->getById($id);
        http_response_code($item ? 200 : 404);
        echo json_encode($item);
    }

    public function listEntriesByKeypad(): void
    {
        header('Content-Type: application/json');
        $keypadId = (int)($_GET['keypad_id'] ?? 0);
        $limit    = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
        echo json_encode($this->entryModel->getByKeypad($keypadId, $limit));
    }

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

    public function deleteEntry(): void
    {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);
        $success = $this->entryModel->delete($id);
        echo json_encode(['success' => $success]);
    }
}
