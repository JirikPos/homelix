<?php
class SensorController
{
  private Sensor          $sensorModel;
  private SensorReading   $readingModel;

  public function __construct(Sensor $sensorModel, SensorReading $readingModel)
  {
    $this->sensorModel  = $sensorModel;
    $this->readingModel = $readingModel;
  }

  // sensors
  public function listSensors(): void
  {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($this->sensorModel->getAll());
  }

  public function getSensor(): void
  {
    header('Content-Type: application/json; charset=utf-8');
    $id = (int)($_GET['id'] ?? 0);
    $item = $this->sensorModel->getById($id);
    http_response_code($item ? 200 : 404);
    echo json_encode($item);
  }

  public function createSensor(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    $id = $this->sensorModel->create(
      $input['name'],
      $input['type'],
      $input['location'] ?? null
    );
    echo json_encode(['id' => $id]);
  }

  public function updateSensor(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    $ok = $this->sensorModel->update(
      (int)$input['id'],
      $input['name'],
      $input['type'],
      $input['location'] ?? null
    );
    echo json_encode(['success' => $ok]);
  }

  public function deleteSensor(): void
  {
    header('Content-Type: application/json');
    $id = (int)($_GET['id'] ?? 0);
    $ok = $this->sensorModel->delete($id);
    echo json_encode(['success' => $ok]);
  }

  // readings
  public function listReadings(): void
  {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($this->readingModel->getAll());
  }

  public function getReading(): void
  {
    header('Content-Type: application/json');
    $id = (int)($_GET['id'] ?? 0);
    $item = $this->readingModel->getById($id);
    http_response_code($item ? 200 : 404);
    echo json_encode($item);
  }

  public function getReadingsBySensor(): void
  {
    header('Content-Type: application/json');
    $sensorId = (int)($_GET['sensor_id'] ?? 0);
    $limit    = isset($_GET['limit']) ? (int)$_GET['limit'] : 100;
    echo json_encode($this->readingModel->getBySensor($sensorId, $limit));
  }

  public function createReading(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    $id = $this->readingModel->create(
      (int)$input['sensor_id'],
      isset($input['value_float']) ? (float)$input['value_float'] : null,
      isset($input['value_bool'])  ? (bool)$input['value_bool'] : null
    );
    echo json_encode(['id' => $id]);
  }

  public function deleteReading(): void
  {
    header('Content-Type: application/json');
    $id = (int)($_GET['id'] ?? 0);
    $ok = $this->readingModel->delete($id);
    echo json_encode(['success' => $ok]);
  }
}
