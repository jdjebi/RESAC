<?php

namespace Form\User\Update;

require_once __DIR__."/Form.php";

class Info extends \Form{

  protected $required = ['nom','prenom','email'];
  protected $emails = ['email'];
  protected $integer = ['promo1','promo2'];

  public function validate(){

    // $phone_number_regex = "/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/";
    $integer_regex = "/^\d+$/";
    $phone_number_regex = "/^[0-9\-\(\)\/\+\s]*$/";
    $numero = $this->data['numero'];

    // Validation des numéros
    if(!preg_match($phone_number_regex,$numero)){
      $this->errors['phone']['numero'] = true;
    }

    // Validation des entiers
    $promo1 = trim($this->data['promo1']);
    $promo2 = trim($this->data['promo2']);

    if(!empty($promo1) || !empty($promo2)){
      if( !empty($promo1) && !empty($promo2) ){

        $error = true;

        if(!preg_match($integer_regex,$promo1)){
          $this->errors['integer']['promo1'] = true;
        }

        if(!preg_match($integer_regex,$promo2)){
          $this->errors['integer']['promo2'] = true;
        }

      }else{
          $this->errors['double_required']['promo'] = true;
      }
    }

    $this->clear_data['email'] = $this->data['email'];

  }
}

class Password extends \Form{

  protected $required = ['pass','nw_pass','conf_pass'];
  
}

?>
