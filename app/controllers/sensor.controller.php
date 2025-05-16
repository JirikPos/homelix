<?php

class SensorController
{
  public function __construct(
    private Sensor $sensorModel,
    private SensorReading $readingModel
  ) {}

  // Sensors
  public function listSensors(): void
  {
    $this->respond($this->sensorModel->getAll());
  }

  public function getSensor(): void
  {
    $id = (int)($_GET['id'] ?? 0);
    $sensor = $this->sensorModel->getById($id);
    http_response_code($sensor ? 200 : 404);
    $this->respond($sensor);
  }

  public function createSensor(): void
  {
    $input = $this->input();
    $id = $this->sensorModel->create($input['name'], $input['type'], $input['location'] ?? null);
    $this->respond(['id' => $id]);
  }

  // Readings
  public function getReadings(): void
  {
    $this->respond($this->readingModel->getAll());
  }

  public function getReadingsBySensor(): void
  {
    $sensorId = (int)($_GET['sensor_id'] ?? 0);
    $this->respond($this->readingModel->getAllBySensorId($sensorId));
  }

  public function getLastReadingsForAllSensors(): void
  {
    $sensors = $this->sensorModel->getAll();
    $result = [];

    foreach ($sensors as $sensor) {
      $reading = $this->readingModel->getLastBySensorId((int)$sensor['id']);

      if ($reading) {
        $result[] = [
          'sensor_id' => $sensor['id'],
          'sensor_name' => $sensor['name'],
          'value_float' => $reading['value_float'],
          'value_bool' => $reading['value_bool'],
          'created_at' => $reading['created_at'],
        ];
      }
    }

    $this->respond($result);
  }


  public function createAllSensorReadings(): void
  {
    $input = $this->input();
    $sensors = $this->sensorModel->getAll();
    $saved = [];

    foreach ($sensors as $sensor) {
      $key = $sensor['name'];
      if (!array_key_exists($key, $input)) continue;

      $value = $input[$key];
      $valueFloat = is_numeric($value) ? (float)$value : null;
      $valueBool  = is_bool($value) ? (bool)$value : null;

      $id = $this->readingModel->create(
        (int)$sensor['id'],
        $valueFloat,
        $valueBool
      );

      $saved[] = ['sensor_id' => $sensor['id'], 'name' => $key, 'reading_id' => $id];
    }

    $this->respond(['inserted' => $saved]);
  }

  // Helpers
  private function input(): array
  {
    return json_decode(file_get_contents('php://input'), true) ?: $_POST;
  }

  private function respond(mixed $data): void
  {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
  }
}
