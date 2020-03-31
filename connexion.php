<?php
  require "src/init.php";

  $form = new LoginForm($_POST);

  if($form->is_validate()){

    $email = $form->get("email");
    $password = $form->get("password");

    $user = authenticate($email,$password);

    if($user){
      login($user);
      Redirect::route('profil');
    }else{
      $form->errors["login_failed"] = true;
    }
  }

  require "views/connexion.view.php";

?>
