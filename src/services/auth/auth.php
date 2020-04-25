<?php

  function authenticate($email,$password){
    global $DB;
    $field = "email";
    $table = "users";
    $password = crypt_password($password);

    $sql = "SELECT * FROM $table WHERE $field = ? AND password = ?";
    $q = $DB->prepare($sql);
    $q->execute([$email,$password]);
    $data = $q->fetchAll(PDO::FETCH_OBJ);

    if($data){
      return $data[0];
    }else{
      return null;
    }
  }

  function login($user){
    $_SESSION["user"] = $user->id;
    $_SESSION["is_staff"] = $user->is_staff;
    $_SESSION["staff_role"] = $user->staff_role;
  }

  function login_as_admin($user){
    login($user);
  }

  function logout(){
    unset($_SESSION["user"]);
    unset($_SESSION["is_staff"]);
    unset($_SESSION["staff_role"]);
  }

  class Auth{
    static function check(){
      if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){
        return 1;
      }
      return 0;
    }

    static function is_admin_logged(){
      if(Auth::check() && Auth::is_admin()){
        return 1;
      }else{
        return 0;
      }
    }

    static function user(){
      return $_SESSION["user"];
    }

    static function is_admin(){
      return $_SESSION["is_staff"];
    }

    static function role(){
      return $_SESSION["staff_role"];
    }
  }

?>
