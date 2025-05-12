<?php

declare(strict_types=1);

$conn = require __DIR__ . '/../db/connect.php';

require_once __DIR__ . '/../controllers/dashboard.controller.php';
require_once __DIR__ . '/../controllers/home.controller.php';
require_once __DIR__ . '/../controllers/sensor.controller.php';
require_once __DIR__ . '/../controllers/keypad.controller.php';

$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path   = rtrim($uri, '/');
$method = $_SERVER['REQUEST_METHOD'];

// API routy
if ($method === 'GET'  && $path === '/api/data') {
  (new DashboardController($conn))->data();
  exit;
}
if ($method === 'POST' && $path === '/api/sensors') {
  (new SensorController($conn))->store();
  exit;
}
if ($method === 'POST' && $path === '/api/keypad') {
  (new KeypadController($conn))->store();
  exit;
}

// View routy
if ($method === 'GET' && ($path === '' || $path === '/')) {
  (new HomeController())->index();
  exit;
}
if ($method === 'GET' && $path === '/dashboard') {
  (new DashboardController($conn))->index();
  exit;
}

// 404
http_response_code(404);
echo "<h1>404 – Stránka nenalezena</h1>";
