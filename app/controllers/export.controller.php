<?php
class ExportController
{
  private mysqli $conn;

  public function __construct(mysqli $conn)
  {
    $this->conn = $conn;
  }

  public function export(): void
  {
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="senzory_export.csv"');
    echo "\xEF\xBB\xBF";
    $sensorIds = $_GET['sensor_ids'] ?? [];

    if (!is_array($sensorIds) || empty($sensorIds)) {
      http_response_code(400);
      echo 'No sensor_ids provided.';
      return;
    }

    $out = fopen('php://output', 'w');
    fputcsv($out, ['Room', 'Sensor', 'Value (float)', 'Value (bool)', 'Timestamp'], ',', '"', '\\');

    $placeholders = implode(',', array_fill(0, count($sensorIds), '?'));
    $types = str_repeat('i', count($sensorIds));
    $stmt = $this->conn->prepare("
            SELECT
                r.created_at,
                r.value_float,
                r.value_bool,
                s.name AS sensor_name,
                rm.name AS room_name
            FROM sensor_readings r
            JOIN sensors s ON s.id = r.sensor_id
            LEFT JOIN rooms rm ON rm.id = s.room_id
            WHERE s.id IN ($placeholders)
            ORDER BY r.created_at DESC
        ");

    $stmt->bind_param($types, ...$sensorIds);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      fputcsv($out, [
        $row['room_name'] ?? 'Neznámá místnost',
        $row['sensor_name'],
        $row['value_float'],
        $row['value_bool'],
        $row['created_at']
      ], ',', '"', '\\');
    }

    fclose($out);
    exit;
  }
}
