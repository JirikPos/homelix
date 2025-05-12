<?php

declare(strict_types=1);

$conn = require __DIR__ . '/../db/connect.php';

require_once __DIR__ . '/../models/sensor-reading.model.php';
require_once __DIR__ . '/../models/sensor.model.php';
require_once __DIR__ . '/../models/keypad.model.php';

require_once __DIR__ . '/../controllers/home.controller.php';
require_once __DIR__ . '/../controllers/dashboard.controller.php';
require_once __DIR__ . '/../controllers/sensor.controller.php';
require_once __DIR__ . '/../controllers/keypad.controller.php';

$sensorReadingModel = new SensorReading($conn);
$sensorModel        = new Sensor($conn);
$keypadModel        = new Keypad($conn);

$homeController      = new HomeController();
$dashboardController = new DashboardController($conn);
$sensorController    = new SensorController($conn, $sensorModel);
$keypadController    = new KeypadController($conn, $keypadModel);

$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path   = rtrim($uri, '/');
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET'  && $path === '/api/data') {

  exit;
}
if ($method === 'POST' && $path === '/api/sensors') {
  $sensorController->store();
  exit;
}
if ($method === 'POST' && $path === '/api/keypad') {
  $keypadController->store();
  exit;
}

if ($method === 'GET' && ($path === '' || $path === '/')) {
  $homeController->index();
  exit;
}
if ($method === 'GET' && $path === '/dashboard') {
  $dashboardController->index();
  exit;
}

http_response_code(404);
echo '<h1>404 – Stránka nenalezena</h1>';
