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
  }

  function logout(){
      unset($_SESSION["user"]);
  }

  class Auth{
    static function check(){
      return isset($_SESSION["user"]) && !empty($_SESSION["user"]);
    }

    static function user(){
      return $_SESSION["user"];
    }
  }

?>
