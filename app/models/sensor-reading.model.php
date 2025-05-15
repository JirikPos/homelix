<?php

class SensorReading
{
  private mysqli $conn;
  private string $table = 'sensor_readings';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function create(int $sensorId, ?float $valueFloat = null, ?bool $valueBool = null): int
  {
    $b = $valueBool ? 1 : 0;
    $stmt = $this->conn->prepare("INSERT INTO $this->table (sensor_id, value_float, value_bool) VALUES (?, ?, ?)");
    $stmt->bind_param('idi', $sensorId, $valueFloat, $b);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function getAll(): array
  {
    return $this->conn->query("SELECT * FROM $this->table ORDER BY created_at DESC")
      ->fetch_all(MYSQLI_ASSOC);
  }

  public function getAllBySensorId(int $sensorId): array
  {
    $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE sensor_id = ? ORDER BY created_at DESC");
    $stmt->bind_param('i', $sensorId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function getLastBySensorId(int $sensorId): ?array
  {
    $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE sensor_id = ? ORDER BY created_at DESC LIMIT 1");
    $stmt->bind_param('i', $sensorId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }
}
