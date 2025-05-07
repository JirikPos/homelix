<?php
require_once __DIR__ . '../../app/controller/sensor.controller.php';

use Controller\SensorController;

$controller = new SensorController();
$controller->handle();
