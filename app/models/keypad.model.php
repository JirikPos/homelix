<?php

class Keypad
{
  private mysqli $conn;
  private string $table = 'keypads';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    $res = $this->conn->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    return $res->fetch_all(MYSQLI_ASSOC);
  }

  public function getById(int $id): ?array
  {
    $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }

  public function getByRoom(int $roomId): array
  {
    $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE room_id = ?");
    $stmt->bind_param('i', $roomId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function create(string $name, ?int $roomId = null): int
  {
    $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, room_id) VALUES (?, ?)");
    $stmt->bind_param('si', $name, $roomId);
    $stmt->execute();
    return $stmt->insert_id;
  }
}
