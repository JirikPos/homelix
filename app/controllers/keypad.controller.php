<?php
class KeypadController
{
  private \mysqli $conn;
  private Keypad  $model;

  public function __construct(\mysqli $conn, Keypad $model)
  {
    $this->conn  = $conn;
    $this->model = $model;
  }

  public function store(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    if (!isset($input['name'])) {
      http_response_code(400);
      echo json_encode(['error' => 'Missing name']);
      exit;
    }
    $id = $this->model->create($input['name']);
    echo json_encode(['status' => 'ok', 'id' => $id]);
  }
}
