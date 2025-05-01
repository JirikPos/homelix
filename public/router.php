<?php
require_once __DIR__ . '/../app/bootstrap.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = rtrim($requestUri, '/');

switch ($requestUri) {
    case '':
    case '/':
    case '/dashboard':
        include __DIR__ . '/views/dashboard.php';
        break;

    case '/settings':
        include __DIR__ . '/views/settings.php';
        break;

    case '/history':
        include __DIR__ . '/views/history.php';
        break;

    case (str_starts_with($requestUri, '/api/')):
        include __DIR__ . $requestUri . '.php';
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Stránka nenalezena</h1>";
}
