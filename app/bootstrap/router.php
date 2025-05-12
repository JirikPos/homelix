<?php

declare(strict_types=1);

$config = require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/home.controller.php';
require_once __DIR__ . '/../controllers/dashboard.controller.php';

$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path   = rtrim($uri, '/');
$method = $_SERVER['REQUEST_METHOD'];

// Zpracování API route
if ($method === 'POST' && $path === '/api/sensors') {
  (new DashboardController($config))->data();
  exit;
}

if ($method === 'POST' && $path === '/api/keypad') {
  (new DashboardController($config))->data();
  exit;
}


// Zpracování views route
if ($method === 'GET' && ($path === '' || $path === '/')) {
  (new HomeController())->index();
  exit;
}

if ($method === 'GET' && $path === '/dashboard') {
  (new DashboardController($config))->index();
  exit;
}

http_response_code(404);
echo "<h1>404 – Stránka nenalezena</h1>";
