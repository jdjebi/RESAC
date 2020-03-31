<?php

class Redirect{
  static public function route($name){
    Redirect::url(route($name));
  }

  static public function url($target){
    header("Location:$target");
    exit();
  }

  static public function back(){
    Redirect::url(HTTP::previous_url());
  }
}

?>
