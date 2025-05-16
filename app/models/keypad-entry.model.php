<?php

class KeypadEntry
{
  private mysqli $conn;
  private string $table = 'keypad_entries';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getLast(): ?array
  {
    $result = $this->conn->query("SELECT * FROM {$this->table} ORDER BY created_at DESC LIMIT 1");
    return $result->fetch_assoc() ?: null;
  }

  public function create(int $code): int
  {
    $stmt = $this->conn->prepare("INSERT INTO keypad_entries (code) VALUES (?)");
    $stmt->bind_param('i', $code);
    $stmt->execute();
    return $stmt->insert_id;
  }
}
