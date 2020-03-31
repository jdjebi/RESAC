<?php

require_once __DIR__."/Form.php";

class LoginForm extends Form{

  protected $required = ['email','password'];

  public function validate(){

    // Vérification de l'existance de l'email et du format
    // Vérification de la taille du mot de passe

  }

}

?>
