<?php

require "src/init.php";

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
    // Renvoye des erreurs
    $errors = $form->get_errors();
  }
}

require "views/commencer.view.php";

?>
