<?php

namespace Form\User\Update;

require_once __DIR__."/Form.php";

class Info extends \Form{

  protected $required = ['nom','prenom','email'];

  public function validate(){
    $this->clear_data['nom'] = $this->data['nom'];
    $this->clear_data['prenom'] = $this->data['prenom'];
    $this->clear_data['email'] = $this->data['email'];
    $this->clear_data['numero'] = $this->data['numero'];
    $this->clear_data['pays'] = $this->data['pays'];
  }
}

class Password extends \Form{
  protected $required = ['pass','nw_pass','conf_pass'];
  public function validate(){}
}

?>
