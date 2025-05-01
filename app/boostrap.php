<?php

session_start();
header('Content-Type: text/html; charset=utf-8');

$config = require_once __DIR__ . '/../.env.php';
require_once __DIR__ . '/Utils/Database.php';
require_once __DIR__ . '/Utils/Logger.php';
