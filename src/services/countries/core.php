<?php

require __DIR__."/data.php";

class Country{

  static function get($key){
    $countries = get_countries_data();
    if(array_key_exists($key,$countries)){
      return $countries[$key];
    }else{
      return "";
    }
  }

  static function json(){
    return json_encode(get_countries_data());
  }
}

?>
