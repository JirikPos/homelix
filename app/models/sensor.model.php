<?php

class Sensor
{
  private mysqli $conn;
  private string $table = 'sensors';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    return $this->conn->query("SELECT * FROM $this->table ORDER BY id")
                      ->fetch_all(MYSQLI_ASSOC);
  }

  public function getById(int $id): ?array
  {
    $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }

  public function create(string $name, string $type, ?string $location): int
  {
    $stmt = $this->conn->prepare("INSERT INTO $this->table (name, type, location) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $name, $type, $location);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function update(int $id, string $name, string $type, ?string $location): bool
  {
    $stmt = $this->conn->prepare("UPDATE $this->table SET name = ?, type = ?, location = ? WHERE id = ?");
    $stmt->bind_param('sssi', $name, $type, $location, $id);
    return $stmt->execute();
  }

  public function delete(int $id): bool
  {
    $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
  }
}
