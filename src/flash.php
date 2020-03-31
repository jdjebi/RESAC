<?php
class Flash{
  static public function add($message,$type="success"){
    if(!isset($_SESSION["notifications"]))
      $_SESSION["notifications"] = [];
    $_SESSION["notifications"][] = ["message" => $message,"type" => $type];
  }

  static public function get(){
    $notifs = [];
    if(isset($_SESSION["notifications"])){
      $notifs = $_SESSION["notifications"];
    }
    $_SESSION["notifications"] = [];
    return $notifs;

  }
}

?>
