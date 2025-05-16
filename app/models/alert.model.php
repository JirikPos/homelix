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

  public function create(string $name, bool $alarm): void
  {
    $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, alarm) VALUES (?, ?)");
    $alarmValue = $alarm ? 1 : 0;
    $stmt->bind_param('si', $name, $alarmValue);
    $stmt->execute();
  }


  public function deactivateAll(): bool
  {
    $sql = "UPDATE {$this->table} SET alarm = 0 WHERE alarm = 1";
    return $this->conn->query($sql);
  }
}
