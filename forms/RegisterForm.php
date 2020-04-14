<?php

require_once __DIR__."/Form.php";

class RegisterForm extends Form{

  protected $required = ['nom','prenom','email','password','conf_password'];

  protected $emails = ['email'];

  protected $equals = [['password','conf_password']];

  public function __construct($data){
    $this->data = $data;
  }

  public function validate(){

    // Unicité de l'adresse E-mail
    if(!$this->isset('emails','email')){
      global $DB;

      $email = $this->data['email'];
      $is_unique = true;
      $q = $DB->prepare("SELECT id FROM users WHERE email = ?");
      $q->execute([$email]);

      if($q->fetch())
        $is_unique = false;

      if(!$is_unique)
        $this->errors['uniques']['email'] = true;
    }

    $this->clear_data['email'] = $this->data['email'];

  }
}

?>
