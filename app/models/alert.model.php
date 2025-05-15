<?php
class Alert
{
  private \mysqli $conn;
  private string $table = 'alerts';

  public function __construct(\mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getLatest(): ?array
  {
    $sql = "SELECT * FROM {$this->table} ORDER BY occurred_at DESC LIMIT 1";
    $result = $this->conn->query($sql);
    return $result->fetch_assoc() ?: null;
  }

  public function setAlarm(bool $state): void
  {
    $this->create($state);
  }

  public function create(bool $alarm): void
  {
    $stmt = $this->conn->prepare("INSERT INTO {$this->table} (alarm) VALUES (?)");
    $alarmValue = $alarm ? 1 : 0;
    $stmt->bind_param('i', $alarmValue);
    $stmt->execute();
  }

  public function deactivateAll(): bool
  {
    $sql = "UPDATE {$this->table} SET alarm = 0 WHERE alarm = 1";
    return $this->conn->query($sql);
  }
}
