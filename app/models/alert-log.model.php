<?php
class AlertLog
{
  private \mysqli $conn;
  private string  $table = 'alerts_log';

  public function __construct(\mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    $res = $this->conn->query("SELECT * FROM {$this->table} ORDER BY occurred_at DESC");
    return $res->fetch_all(MYSQLI_ASSOC);
  }

  public function getById(int $id): ?array
  {
    $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }

  public function getBySensor(int $sensorId, int $limit = 50): array
  {
    $stmt = $this->conn->prepare(
      "SELECT * FROM {$this->table} WHERE sensor_id = ? ORDER BY occurred_at DESC LIMIT ?"
    );
    $stmt->bind_param('ii', $sensorId, $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function create(int $sensorId, ?int $readingId, float $value, string $thresholdType): int
  {
    $stmt = $this->conn->prepare(
      "INSERT INTO {$this->table} (sensor_id, reading_id, value, threshold_type) VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param('iids', $sensorId, $readingId, $value, $thresholdType);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function delete(int $id): bool
  {
    $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
  }
}
