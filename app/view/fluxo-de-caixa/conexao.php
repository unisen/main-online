<?php

if($_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'],"192.168") !== false) {
    // Change this to your connection info.
    $host = 'localhost';
    $db = 'unisen19_financeiro';
    $user = 'root';
    $password = '';
  }
  else {
    // Connection servidor.
    $host = 'localhost';
    $db = 'chefre17_unisen19_financeiro';
    $user = 'chefre17_unisen2107';
    $password = 'LgBkCfTv7DEP';
  }

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
     echo $e->getMessage();
}