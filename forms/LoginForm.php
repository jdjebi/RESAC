<?php

require_once __DIR__."/Form.php";

class LoginForm extends Form{

  protected $required = ['email','password'];

}

?>
