// app/controllers/SensorController.php
<?php
class SensorController
{
  private \mysqli $conn;
  private Sensor  $model;

  public function __construct(\mysqli $conn, Sensor $model)
  {
    $this->conn  = $conn;
    $this->model = $model;
  }

  public function store(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    if (!isset($input['name'], $input['type'])) {
      http_response_code(400);
      echo json_encode(['error' => 'Missing name or type']);
      exit;
    }
    $id = $this->model->create($input['name'], $input['type'], $input['location'] ?? null);
    echo json_encode(['status' => 'ok', 'id' => $id]);
  }
}
