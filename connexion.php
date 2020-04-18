<?php
  require "src/init.php";

  require "middleware/guest.php";

  $form = new LoginForm($_POST);

  if($form->is_validate()){

    $email = $form->get("email");
    $password = $form->get("password");
    $user = authenticate($email,$password);

    if($user){

      login($user);

      if(isset($_GET['redirect']))
        Redirect::url($_GET['redirect']);
      else
        Redirect::route('profil');

    }else{
      $form->errors["login_failed"] = true;
    }
  }

  if(isset($_GET['redirect'])){
    $redirect_url = '?redirect='.$_GET['redirect'];
  }else{
    $redirect_url = "";
  }

  $title2 = "Connexion";

  render('connexion',[
    'form' => $form,
    'redirect_url' => $redirect_url,
    'title2' => $title2
  ])

?>
