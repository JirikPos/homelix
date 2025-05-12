<?php
declare(strict_types=1);

$config = require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/home.controller.php';
require_once __DIR__ . '/../controllers/dashboard.controller.php';

$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path   = rtrim($uri, '/');
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET' && ($path === '' || $path === '/')) {
    // hlavní stránka
    (new HomeController())->index();

} elseif ($method === 'GET' && $path === '/dashboard') {
    // dashboard stránka
    (new DashboardController($config))->index();

} elseif ($method === 'GET' && $path === '/api/data') {
    // API endpoint
    (new DashboardController($config))->data();

} else {
    // 404
    http_response_code(404);
    echo "<h1>404 – Stránka nenalezena</h1>";
}
