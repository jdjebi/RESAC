<?php

require_once __DIR__."/Form.php";

class RegisterForm extends Form{

  protected $required = ['nom','prenom','email','password','conf_password'];

  public function __construct($data){
    $this->data = $data;
  }

  public function validate(){
    $this->clear_data['nom'] = $this->data['nom'];
    $this->clear_data['prenom'] = $this->data['prenom'];
    $this->clear_data['email'] = $this->data['email'];
    $this->clear_data['password'] = $this->data['password'];
    $this->clear_data['conf_password'] = $this->data['conf_password'];
  }

}

?>
