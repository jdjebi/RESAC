<?php

require_once __DIR__."/Form.php";

class RegisterForm extends Form{

  protected $required = ['nom','prenom','email','password','conf_password'];

  protected $emails = ['email'];

  protected $equals = [['password','conf_password']];

  public function __construct($data){
    $this->data = $data;
  }

  public function check_email(){
    // Unicité de l'adresse E-mail
    if(!$this->isset('emails','email')){
      if(!Users::email_is_unique($this->data['email']))
        $this->errors['uniques']['email'] = true;
    }
  }

  public function validate(){
    $this->check_email();
    $this->clear_data['email'] = $this->data['email'];
  }
}

?>
