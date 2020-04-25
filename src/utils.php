<?php

  if(!function_exists("route")){
    function route($name){
      global $routes;
      return $routes[$name];
    }
  }


  if(!function_exists("route")){
    function redirect($target){
      header("Location:$target");
      exit();
    }
  }

  if(!function_exists("session")){
    function session($key){
      return $_SESSION[$key];
    }
  }

  if(!function_exists("static")){

    

  }

  function crypt_password($password){
    return sha1($password);
  }

  function exist($val){
    return isset($val) && !empty($val);
  }

  function get_val_exist($key){
    return exist($_GET[$key]);
  }

  if(!function_exists("route")){
    function dump($data){
      echo "<pre style='background-color: #2e2e2e; color: #4CAF50; font-weight: 900;'>";
      var_dump($data);
      echo "</pre>";
    }
  }

?>
