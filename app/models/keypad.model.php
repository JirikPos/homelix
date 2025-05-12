<?php
class Keypad
{
  private \mysqli $conn;
  private string  $table = 'keypads';

  public function __construct(\mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getAll(): array
  {
    $res = $this->conn->query("SELECT * FROM {$this->table} ORDER BY id");
    return $res->fetch_all(MYSQLI_ASSOC);
  }

  public function getById(int $id): ?array
  {
    $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc() ?: null;
  }

  public function create(string $name): int
  {
    $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name) VALUES (?)");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function update(int $id, string $name): bool
  {
    $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ? WHERE id = ?");
    $stmt->bind_param('si', $name, $id);
    return $stmt->execute();
  }

  public function delete(int $id): bool
  {
    $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
  }
}
