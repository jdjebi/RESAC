<?php

use Illuminate\Support\Facades\Http;

if(!function_exists("redirect")){
  function redirect($target){
    header("Location:$target");
    exit();
  }
}

if(!function_exists("is_current_url")){
  function is_current_url($route_name, $active='active'){
    return Route::currentRouteName()== $route_name ? $active : '';
  }
}

if(!function_exists("is_currents_url")){
  function is_currents_url($routes_name, $active='active'){
    foreach($routes_name as $route_name){
      if(Route::currentRouteName()== $route_name)
        return $active;
    }
    return "";    
  }
}

if(!function_exists("photos_cdn_asset")){
  function photos_cdn_asset($user){

    $url = asset($user->photo);

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

    if(env('APP_ENV') == "web"){
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

    $url = countryflags_cdn($flag_code,$size);     

    return "<img src=\"{$url}\" alt=\"\"> ";
  }  
}

if(!function_exists("UserAuth")){
  function UserAuth(){
    /*
      Retourne l'instance du l'utilisateur connecté. Si aucun alors on retourne nul
    */   

    return \Illuminate\Support\Facades\Auth::user();
  }  
}


if(!function_exists("local_asset")){
  function local_asset($path){
    /*
      Retourne lien vers la ressource stocké sur le serveur local
    */   


    $url = asset("asset/{$path}");

    return $url;
  }
}

if(!function_exists("cdn_asset")){
  function cdn_asset($path,$version=1){
    /*
      Retourne lien vers la ressource stocké sur le serveur CDN à partir de path
      - Si $path commence par asset, alors asset sera retiré
    */   

    $url = "";
    $use_cdn = config("cdn.use_cdn");
    $cdn_host = config("cdn.cdn_host"); 

    // Retire asset/ au début de $path
    $path = preg_replace("#^asset/(.+)#","$1",$path);

    if($use_cdn){
      $url = "{$cdn_host}/{$path}";
    }else{
      $url = local_asset($path);
    }

    return $url;
    
  }  
}


if(!function_exists("web_asset")){
  function web_asset($path,$web_url,$version=1){
    /*
      Retourne lien vers la ressource stocké sur le serveur CDN ou sur l'url précisée dans $web_url
    */   

    if(env('APP_ENV') == "web"){
      $url = $web_url;
    }else{
      $url = cdn_asset($path,$version);
    }

    return $url;
    
  }  
}

if(!function_exists("web_local_asset")){
  function web_local_asset($path,$web_url,$version=1){
    /*
      Retourne lien vers la ressource stocké sur le serveur local ou sur l'url précisée dans $web_url
    */   

    if(env('APP_ENV') == "web"){
      $url = $web_url;
    }else{
      $url = local_asset($path,$version);
    }

    return $url;
    
  }  
}

?>