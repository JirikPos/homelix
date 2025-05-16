<?php

class Scene
{
  private mysqli $conn;
  private string $table = 'scenes';

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function getActive(): ?array
  {
    $result = $this->conn->query("SELECT * FROM {$this->table} WHERE enabled = 1 LIMIT 1");
    return $result->fetch_assoc() ?: null;
  }

  public function getAll(): array
  {
    $result = $this->conn->query("SELECT * FROM {$this->table} ORDER BY name ASC");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function activate(int $id): bool
  {
    $this->conn->query("UPDATE {$this->table} SET enabled = 0");
    $stmt = $this->conn->prepare("UPDATE {$this->table} SET enabled = 1 WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
  }

  public function deactivate(int $id): bool
  {
    $stmt = $this->conn->prepare("UPDATE {$this->table} SET enabled = 0 WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
  }
}
