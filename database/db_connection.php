<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "youniti";

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  require __DIR__."/../src/config.php";
  require __DIR__."/failed.php";
  exit();
}

$DB = $db;

?>
