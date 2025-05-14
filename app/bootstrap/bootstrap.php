<?php

declare(strict_types=1);

// Config
$config = require_once __DIR__ . '/../bootstrap/config.php';

// DB connection init
require_once __DIR__ . '/../db/connect.php';
$database = new Database($config['db']);
$conn     = $database->init();

// Models
require_once __DIR__ . '/../models/sensor-reading.model.php';
require_once __DIR__ . '/../models/sensor.model.php';
require_once __DIR__ . '/../models/keypad.model.php';
require_once __DIR__ . '/../models/keypad-entry.model.php';
require_once __DIR__ . '/../models/alert-log.model.php';

// Controllers
require_once __DIR__ . '/../controllers/home.controller.php';
require_once __DIR__ . '/../controllers/dashboard.controller.php';
require_once __DIR__ . '/../controllers/sensor.controller.php';
require_once __DIR__ . '/../controllers/keypad.controller.php';
require_once __DIR__ . '/../controllers/alert.controller.php';
require_once __DIR__ . '/../controllers/email.controller.php';
require_once __DIR__ . '/../controllers/notfound.controller.php';
require_once __DIR__ . '/../controllers/info.controller.php';

// Email service
require_once __DIR__ . '/../service/email.service.php';
$emailSvc = new EmailService(
  'no-reply@example.com',
  'support@example.com',
  __DIR__ . '/../email'
);

// DI
$emailCtrl = new EmailController($emailSvc);

$sensorReadingModel = new SensorReading($conn);
$sensorModel        = new Sensor($conn);
$keypadModel        = new Keypad($conn);
$keypadEntryModel   = new KeypadEntry($conn);
$alertLogModel      = new AlertLog($conn);

$notFoundController = new NotFoundController();
$homeController      = new HomeController();
$dashboardController = new DashboardController();
$infoController      = new InfoController();
$sensorController    = new SensorController($sensorModel, $sensorReadingModel);
$keypadController    = new KeypadController($keypadModel, $keypadEntryModel);
$alertLogController  = new AlertLogController($alertLogModel);

$path   = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];

// API
if ($method === 'GET'  && $path === '/api/sensors') {
  $sensorController->listSensors();
  exit;
}
if ($method === 'GET'  && $path === '/api/sensors/item') {
  $sensorController->getSensor();
  exit;
}
if ($method === 'POST' && $path === '/api/sensors') {
  $sensorController->createSensor();
  exit;
}
if ($method === 'PUT'  && $path === '/api/sensors') {
  $sensorController->updateSensor();
  exit;
}
if ($method === 'DELETE' && $path === '/api/sensors') {
  $sensorController->deleteSensor();
  exit;
}

if ($method === 'GET'  && $path === '/api/readings') {
  $sensorController->listReadings();
  exit;
}
if ($method === 'GET'  && $path === '/api/readings/item') {
  $sensorController->getReading();
  exit;
}
if ($method === 'GET'  && $path === '/api/readings/by-sensor') {
  $sensorController->getReadingsBySensor();
  exit;
}
if ($method === 'POST' && $path === '/api/readings') {
  $sensorController->createReading();
  exit;
}
if ($method === 'DELETE' && $path === '/api/readings') {
  $sensorController->deleteReading();
  exit;
}

if ($method === 'GET'  && $path === '/api/keypads') {
  $keypadController->listKeypads();
  exit;
}
if ($method === 'GET'  && $path === '/api/keypads/item') {
  $keypadController->getKeypad();
  exit;
}
if ($method === 'POST' && $path === '/api/keypads') {
  $keypadController->createKeypad();
  exit;
}
if ($method === 'PUT'  && $path === '/api/keypads') {
  $keypadController->updateKeypad();
  exit;
}
if ($method === 'DELETE' && $path === '/api/keypads') {
  $keypadController->deleteKeypad();
  exit;
}

if ($method === 'GET'  && $path === '/api/keypad-entries') {
  $keypadController->listEntries();
  exit;
}
if ($method === 'GET'  && $path === '/api/keypad-entries/item') {
  $keypadController->getEntry();
  exit;
}
if ($method === 'GET'  && $path === '/api/keypad-entries/by-keypad') {
  $keypadController->listEntriesByKeypad();
  exit;
}
if ($method === 'POST' && $path === '/api/keypad-entries') {
  $keypadController->createEntry();
  exit;
}
if ($method === 'DELETE' && $path === '/api/keypad-entries') {
  $keypadController->deleteEntry();
  exit;
}

if ($method === 'GET'  && $path === '/api/alerts') {
  $alertLogController->data();
  exit;
}
if ($method === 'GET'  && $path === '/api/alerts/item') {
  $alertLogController->show();
  exit;
}
if ($method === 'GET'  && $path === '/api/alerts/by-sensor') {
  $alertLogController->bySensor();
  exit;
}
if ($method === 'POST' && $path === '/api/alerts') {
  $alertLogController->store();
  exit;
}
if ($method === 'DELETE' && $path === '/api/alerts') {
  $alertLogController->delete();
  exit;
}

// Views
if ($method === 'GET' && ($path === '' || $path === '/')) {
  $homeController->index();
  exit;
}
if ($method === 'GET' && $path === '/dashboard') {
  $dashboardController->index();
  exit;
}

if ($method === 'GET' && $path === '/info-o-projektu') {
  $infoController->index();
  exit;
}

if (http_response_code(404)) {
  $notFoundController->index();
  exit;
}
