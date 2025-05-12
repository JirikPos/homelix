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

  public function data(): void
  {
    header('Content-Type: application/json');

    $sql = 'SELECT timestamp, value
                  FROM measurements
                 ORDER BY timestamp DESC
                 LIMIT 10';
    $res = mysqli_query($this->conn, $sql);
    if (!$res) {
      http_response_code(500);
      echo json_encode(['error' => mysqli_error($this->conn)]);
      exit;
    }

    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo json_encode($rows);
  }
}
