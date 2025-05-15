<?php

class KeypadEntry
{
  private mysqli $conn;
  private string $table = 'keypad_entries';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    return $this->conn->query("SELECT * FROM $this->table ORDER BY created_at DESC")
                      ->fetch_all(MYSQLI_ASSOC);
  }

  public function getById(int $id): ?array
  {
    $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }

  public function getByKeypad(int $keypadId, int $limit = 50): array
  {
    $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE keypad_id = ? ORDER BY created_at DESC LIMIT ?");
    $stmt->bind_param('ii', $keypadId, $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function create(int $keypadId, int $code): int
  {
    $stmt = $this->conn->prepare("INSERT INTO $this->table (keypad_id, code) VALUES (?, ?)");
    $stmt->bind_param('ii', $keypadId, $code);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function delete(int $id): bool
  {
    $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
  }
}
