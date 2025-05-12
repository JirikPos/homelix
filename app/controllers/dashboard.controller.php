<?php
class DashboardController
{
  private array $dbCfg;

  public function __construct(array $config)
  {
    $this->dbCfg = $config['db'];
  }

  // HTML stránka
  public function index(): void
  {
    include __DIR__ . '/../views/dashboard.php';
  }

  // JSON data
  public function data(): void
  {
    header('Content-Type: application/json');

    // 1) připojíme PDO s timeoutem
    try {
      $pdo = new PDO(
        $this->dbCfg['dsn'],
        $this->dbCfg['user'],
        $this->dbCfg['pass'],
        [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_TIMEOUT            => $this->dbCfg['timeout'],
        ]
      );
    } catch (PDOException $e) {
      http_response_code(500);
      echo json_encode(['error' => 'DB connection failed']);
      exit;
    }

    // 2) načteme posledních 10 záznamů
    $stmt = $pdo->query(
      'SELECT timestamp, value 
             FROM measurements 
             ORDER BY timestamp DESC 
             LIMIT 10'
    );
    echo json_encode($stmt->fetchAll());
  }
}
