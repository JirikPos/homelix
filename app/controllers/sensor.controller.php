<?php
namespace SensorController;

use SensorModel\SensorModel;
use SensorService\SensorService;

class SensorController {
    public function handle(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Použij POST']);
            return;
        }

        $payload = json_decode(file_get_contents('php://input'), true);

        $sensor = Sensor::fromArray($payload);
        SensorService::process($sensor);

        echo json_encode(['status' => 'OK']);
    }
}
