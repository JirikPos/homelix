<?php

$config = require __DIR__ . '.env.php';

$conn = mysqli_connect(
    hostname: $config['host'],
    username: $config['user'],
    password: $config['pass'],
    database: $config['name']
);

if (!$conn) {
    die('Chyba připojení: ' . mysqli_connect_error());
}
