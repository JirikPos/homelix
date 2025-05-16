<?php

class PeripheralState
{
  private mysqli $conn;
  private string $table = 'peripheral_states';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    $sql = "SELECT * FROM {$this->table}";
    return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
  }

  public function getByPeripheralId(int $id): ?array
  {
    $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE peripheral_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }

  public function setState(int $id, ?float $valueFloat, ?bool $valueBool): void
  {
    $stmt = $this->conn->prepare(
      "REPLACE INTO {$this->table} (peripheral_id, value_float, value_bool) VALUES (?, ?, ?)"
    );
    $bool = isset($valueBool) ? (int)$valueBool : null;
    $stmt->bind_param('idd', $id, $valueFloat, $bool);
    $stmt->execute();
  }
}
