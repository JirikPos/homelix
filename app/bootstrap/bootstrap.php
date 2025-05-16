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
require_once __DIR__ . '/../models/keypad-entry.model.php';
require_once __DIR__ . '/../models/alert.model.php';
require_once __DIR__ . '/../models/scene.model.php';
require_once __DIR__ . '/../models/peripheral.model.php';
require_once __DIR__ . '/../models/peripheral-states.model.php';

// Controllers
require_once __DIR__ . '/../controllers/export.controller.php';
require_once __DIR__ . '/../controllers/home.controller.php';
require_once __DIR__ . '/../controllers/dashboard.controller.php';
require_once __DIR__ . '/../controllers/sensor.controller.php';
require_once __DIR__ . '/../controllers/keypad.controller.php';
require_once __DIR__ . '/../controllers/alert.controller.php';
require_once __DIR__ . '/../controllers/peripheral.controller.php';
require_once __DIR__ . '/../controllers/scene.controller.php';
require_once __DIR__ . '/../controllers/notfound.controller.php';
require_once __DIR__ . '/../controllers/info.controller.php';

// Services
require_once __DIR__ . '/../service/smarthome.service.php';
require_once __DIR__ . '/../service/email.service.php';

// DI
$sensorReadingModel = new SensorReading($conn);
$sensorModel        = new Sensor($conn);
$keypadEntryModel   = new KeypadEntry($conn);
$sceneModel        = new Scene($conn);
$alertModel      = new Alert($conn);
$peripheralModel = new Peripheral($conn);
$peripheralStateModel = new PeripheralState($conn);

// Services
$emailSvc = new EmailService(
  'no-reply@example.com',
  'support@example.com',
  __DIR__ . '/../email'
);

$smartHomeService = new SmartHomeService(
  $sensorModel,
  $sensorReadingModel,
  $sceneModel,
  $keypadEntryModel,
  $peripheralModel,
  $peripheralStateModel,
  $alertModel,
  $emailSvc,
  $config
);
$smartHomeService->evaluateSystem();

$exportController = new ExportController($conn);
$notFoundController = new NotFoundController();
$homeController      = new HomeController();
$dashboardController = new DashboardController();
$infoController      = new InfoController();
$sceneController = new SceneController($sceneModel, $alertModel);
$sensorController    = new SensorController($sensorModel, $sensorReadingModel);
$keypadController    = new KeypadController($keypadEntryModel);
$alertController  = new AlertController($alertModel);
$peripheralController = new PeripheralController($peripheralModel, $peripheralStateModel);


$path   = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];

// API
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $path === '/api/export') {
  $exportController->export();
  exit;
}

if ($method === 'GET' && $path === '/api/scenes') {
  $sceneController->getAll();
  exit;
}

if ($method === 'GET' && $path === '/api/scenes/active') {
  $sceneController->getActive();
  exit;
}

if ($method === 'PATCH' && $path === '/api/scenes/activate') {
  $sceneController->activate();
  exit;
}

if ($method === 'PATCH' && $path === '/api/scenes/deactivate') {
  $sceneController->deactivate();
  exit;
}

if ($method === 'GET' && $path === '/api/peripherals') {
  $peripheralController->getAll();
  exit;
}

if ($method === 'GET' && $path === '/api/peripherals/states') {
  $peripheralController->getStates();
  exit;
}

if ($method === 'PATCH' && $path === '/api/peripherals/state') {
  $peripheralController->setState();
  exit;
}

if ($method === 'GET'  && $path === '/api/sensors') {
  $sensorController->listSensors();
  exit;
}

if ($method === 'GET' && $path === '/api/readings/by-sensor') {
  $sensorController->getReadingsBySensor();
  exit;
}
if ($method === 'GET' && $path === '/api/readings/last') {
  $sensorController->getLastReadingsForAllSensors();
  exit;
}

if ($method === 'POST' && $path === '/api/keypad-entries') {
  $keypadController->createEntry();
  exit;
}

if ($method === 'GET'  && $path === '/api/alert') {
  $alertController->getLast();
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
