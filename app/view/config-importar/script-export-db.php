<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'],"192.168") !== false) {
  // Change this to your connection info.
  $database = 'escala_db';
  $user = 'root';
  $pass = '';
  $host = 'localhost';
  $dir = dirname(__FILE__) . "/" . "$database.sql";
}
else {
  // Connection servidor.
  $host = 'localhost';
  $user = 'chefre17_unisen2107';
  $pass = 'LgBkCfTv7DEP';
  $database = 'chefre17_dbunisen';
  $dir = dirname(__FILE__) . "/" . "$database.sql";
}

echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";

$command = "mysqldump --user={$user} --password={$pass} --host={$host} {$database} > $dir";

shell_exec($command);

var_dump($dir);