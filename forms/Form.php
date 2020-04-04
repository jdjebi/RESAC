<?php
class Form{
  protected $is_validate = true;
  protected $already_validate = false;
  protected $data = [];
  protected $clear_data = [];
  protected $required = [];
  public $errors = [];

  public function __construct($data = [], $default_data = []){
    $this->data = $data;
    $this->error["messages"] = [];
    $this->set_default($default_data);
  }

  public function set_default($data){
    foreach ($data as $key => $value) {
      $this->clear_data[$key] = $value;
    }
  }

  public function validate(){}

  public function check_required(){
    foreach ($this->required as $key) {
      if( !array_key_exists($key,($this->data)) or empty(trim($this->data[$key])) ){
        $this->errors['required'] = true;
        $this->clear_data[$key] = "";
      }else{
        $this->clear_data[$key] = $this->data[$key];
      }
    }
  }

  public function is_validate(){
    if($this->data){
      // Validation des champs requis
      $this->check_required();

      // Validation de tous les champs
      if(!$this->is_errors()){
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

  public function get_data(){
    return $this->clear_data;
  }

  public function add_error($field,$message){
    $this->errors[$field] = true;
    $this->errors["messages"][$field] = $message;
  }

}
?>
