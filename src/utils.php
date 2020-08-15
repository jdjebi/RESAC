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

  if(!function_exists("is_current_url")){
    function is_current_url($route_name, $active='active'){

      #echo Route::currentRouteName();
      #echo ' '.route($route_name);
      #echo ' '.url()->full();

      return url()->full() == route($route_name) ? $active : '';
    }
  }

  if(!function_exists("photos_cdn_asset")){
    function photos_cdn_asset($user){

      $url = $user->photo;

      if(env('APP_ENV') == "web"){
        try {
          $url = Storage::disk('dropbox')->url($path);
        } catch (Exception $e) {}
      }

      return $url;
    }  
  }

  if(!function_exists("countryflags_cdn")){
    function countryflags_cdn($flag_code, $size=32){
      /*
        Retourne le lien vers l'image du drapeau correspondant code au code spécifié
      */

      $url = "";

      if(env('APP_ENV') == "local"){
        $url = "https://www.countryflags.io/{$flag_code}/shiny/{$size}.png";
      }

      return $url;
    }  
  }

  if(!function_exists("html_countryflags")){
    function html_countryflags($flag_code, $size=32){
      /*
        Retourne le lien vers l'image du drapeau correspondant code au code spécifié
      */

      $url = "";

      if(env('APP_ENV') == "web"){
        $url = countryflags_cdn($flag_code,$size);     
      }

      return "<img src=\"{$url}\" alt=\"\"> ";
    }  
  }



?>