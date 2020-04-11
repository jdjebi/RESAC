<?php

if(isset($_SERVER["HEROKU_APP_DIR"])){
  
  return [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbname" => "youniti"
  ];

}else{

  return [
    "host" => "jfrpocyduwfg38kq.chr7pe7iynqr.eu-west-1.rds.amazonaws.com",
    "username" => "nc0p25hz6kjx2boe",
    "password" => "y6t93gnem2pphg3z",
    "dbname" => "qn4vudjk5am7incz"
  ];

}


?>
