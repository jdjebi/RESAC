<?php
class Form{
  /*
    v2

    La version du formulaire implémente la logique de la version précédente

    Les données optionelles ne sont pas automatiquement ajouté au clear_data

  */

  protected $is_validate = true;
  protected $already_validate = false;
  protected $data = [];
  protected $clear_data = [];
  protected $required = [];
  protected $types = ['required2','emails','uniques'];

  public $errors = [];


  public function __construct($data = [], $default_data = []){
    $this->data = $data;
    $this->error["messages"] = [];
    $this->set_default($default_data);
  }

  public function validate(){}

  public function validate_emails(){
    // Validation du format: Adresse E-mail
    foreach ($this->emails as $key) {
      $email = $this->data[$key];
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->clear_data[$key] = $this->data[$key];
      }else{
        $this->errors['emails'][$key] = true;
        $this->clear_data[$key] = "";
      }
    }
  }

  public function validate_equals(){
    // Validation des valeurs égales - Comparaison égalitaire de deux valeurs
    foreach ($this->equals as $tuple) {
      $key1 = $tuple[0];
      $key2 = $tuple[1];
      $val1 = $this->data[$key1];
      $val2 = $this->data[$key2];
      if($val1 != $val2){
        $this->errors['equals'][$key1] = true;
        $this->clear_data[$key1] = "";
        $this->clear_data[$key2] = "";
      }else{
        $this->clear_data[$key1] = $val1;
        $this->clear_data[$key2] = $val2;
      }
    }
  }

  public function auto_validate(){
    $this->validate_emails();
    $this->validate_equals();
  }

  public function set_default($data){
    foreach ($data as $key => $value) {
      $this->clear_data[$key] = $value;
    }
  }


  public function check_required(){

    // On ajoute toute les valeurs au valeurs propres
    foreach ($this->data as $key => $value) {
      $this->clear_data[$key] = $value;
    }

    // On traite le cas des valeurs manquantes
    foreach ($this->required as $key) {
      if( !array_key_exists($key,($this->data)) or empty(trim($this->data[$key])) ){
        $this->errors["required2"][$key] = true;
        $this->errors['required'] = true;
      }
    }

  }

  public function is_validate(){

    if($this->data){
      // Validation des champs requis
      $this->check_required();

      // Validation de tous les champs
      if(!$this->is_errors()){
          $this->auto_validate();
          $this->validate();
          if($this->is_errors()){
            $this->is_validate = false;
          }
      }else{
        $this->is_validate = false;
      }
    }else{
      $this->is_validate = false;
    }
    return $this->is_validate;
  }

  public function is_errors(){
    return count($this->errors) > 0;
  }

  public function isset($type,$key){
    // Vérifie s'il y'a une erreur sur un champ
    if($type == '*'){
      foreach($this->types as $t){
        if(isset($this->errors[$t][$key]))
          return true;
      }
      return false;
    }else{
      return isset($this->errors[$type][$key]);
    }
  }

  public function get($key){
    if(array_key_exists($key,$this->clear_data)){
        return $this->clear_data[$key];
    }else{
      return "";
    }
  }

  public function get_errors(){
    return $this->errors;
  }

  public function get_error($type,$key){
    if($this->isset($type,$key)){
      return $this->errors['messages'][$key];
    }else{
      return "";
    }
  }

  public function get_data(){
    return $this->clear_data;
  }

  public function add_error($field,$message){
    $this->errors[$field] = true;
    $this->errors["messages"][$field] = $message;
  }

}
?>
