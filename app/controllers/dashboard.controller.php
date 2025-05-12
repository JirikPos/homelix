<?php
class DashboardController
{
  private mysqli $conn;

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function index(): void
  {
    include __DIR__ . '/../views/dashboard.php';
  }
}
