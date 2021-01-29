<?php

$DB = null;

if(!isset($_SERVER["HEROKU_APP_DIR"])){

  $DEBUG = false;

}else{

  $DEBUG = true;
  
}

 // Test la connexion à la base de données
 $host = env("DB_HOST","127.0.0.1");
 $username = env("DB_USERNAME","root");
 $password = env("DB_PASSWORD","");
 $dbname = env("DB_DATABASE","resac");

 try {
     $db = new \PDO("mysql:host=$host;dbname=$dbname",$username,$password);
     $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
 } catch (\PDOException $e) {
     require __DIR__."\\..\\database\\failed.php";
     exit();
 }


?>
