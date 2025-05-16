<?php

class Peripheral
{
  private mysqli $conn;
  private string $table = 'peripherals';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    $sql = "SELECT * FROM {$this->table} ORDER BY id";
    return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
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

  public function create(string $name, string $type, ?int $roomId): int
  {
    $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, type, room_id) VALUES (?, ?, ?)");
    $stmt->bind_param('ssi', $name, $type, $roomId);
    $stmt->execute();
    return $stmt->insert_id;
  }
}
