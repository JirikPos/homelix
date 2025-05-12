<?php
class SensorController
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function store(): void
    {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
        if (!isset($input['value'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing value']);
            exit;
        }

        $stmt = mysqli_prepare(
            $this->conn,
            'INSERT INTO measurements (timestamp, value) VALUES (NOW(), ?)'
        );
        mysqli_stmt_bind_param($stmt, 'd', $input['value']);
        if (!mysqli_stmt_execute($stmt)) {
            http_response_code(500);
            echo json_encode(['error' => mysqli_error($this->conn)]);
            exit;
        }

        echo json_encode(['status'=>'ok','id'=> mysqli_insert_id($this->conn)]);
    }
}
