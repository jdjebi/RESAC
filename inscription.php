<?php

require "src/init.php";

require "middleware/guest.php";

$form = new RegisterForm($_POST);

if($_POST){
  // Validation
  if($form->is_validate()){

    // Enregistrement
    $data = $form->get_data();

    $data = [
      "nom" => $data["nom"],
      "prenom" => $data["prenom"],
      "email" => $data["email"],
      "password" => crypt_password($data["password"])
    ];

    $user = Users::create($data);

    // Notification
    Flash::add("Inscription réussie. Vous pouvez vous connecter.","success");

    // Redirection
    Redirect::route('home');
  }else{

    if($form->isset('emails','email')){
      $form->add_error('email',"Le format de l'adresse E-mail est incorrecte.");
    }else if($form->isset('uniques','email')){
      $form->add_error('email',"Adresse E-mail déjà utilisée.");
    }

    if($form->isset('equals','password')){
      $form->add_error('password',"Les mots de passe sont différents.");
    }

    $errors = $form->get_errors();
  }

  // dump($form->get_errors());
  // dump($form->get_data());

}

require "views/inscription.view.php";

?>
