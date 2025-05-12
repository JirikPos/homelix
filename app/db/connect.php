<?php
$config = require __DIR__ . '../../config/config.php';
$db     = $config['db'];

$conn = mysqli_init();

// if (!mysqli_real_connect(
//     $conn,
//     $db['host'],
//     $db['user'],
//     $db['pass'],
//     $db['name']
// )) {
//     die('Chyba připojení: ' . mysqli_connect_error());
// }

return $conn;
