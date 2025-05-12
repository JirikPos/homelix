<?php
class SensorReading
{
  private \mysqli $conn;
  private string  $table = 'sensor_readings';

  public function __construct(\mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    $res = $this->conn->query(
      "SELECT * FROM {$this->table} ORDER BY created_at DESC"
    );
    return $res->fetch_all(MYSQLI_ASSOC);
  }

  public function getById(int $id): ?array
  {
    $stmt = $this->conn->prepare(
      "SELECT * FROM {$this->table} WHERE id = ?"
    );
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }

  public function getBySensor(int $sensorId, int $limit = 100): array
  {
    $stmt = $this->conn->prepare(
      "SELECT * FROM {$this->table}
             WHERE sensor_id = ?
             ORDER BY created_at DESC
             LIMIT ?"
    );
    $stmt->bind_param('ii', $sensorId, $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function create(int $sensorId, ?float $valueFloat = null, ?bool $valueBool = null): int
  {
    $stmt = $this->conn->prepare(
      "INSERT INTO {$this->table}
             (sensor_id, value_float, value_bool)
             VALUES (?, ?, ?)"
    );
    $b = $valueBool ? 1 : 0;
    $stmt->bind_param('idi', $sensorId, $valueFloat, $b);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function delete(int $id): bool
  {
    $stmt = $this->conn->prepare(
      "DELETE FROM {$this->table} WHERE id = ?"
    );
    $stmt->bind_param('i', $id);
    return $stmt->execute();
  }
}
