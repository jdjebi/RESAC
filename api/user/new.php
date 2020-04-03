<?php

require __DIR__."/../../src/init.php";

$data = [
  'test' => "test"
];

$form = new RegisterForm($_POST);

if($_POST){
  // Validation
  if($form->is_validate()){

    // Enregistrement
    $data = $form->get_data();

    /*
    $data = [
      "nom" => $data["nom"],
      "prenom" => $data["prenom"],
      "email" => $data["email"],
      "password" => crypt_password($data["password"])
    ];

    $user = Users::create($data);

    // Notification
    // Flash
    echo "Inscription réussie. Vous pouvez vous connecter.";
    */

    // Redirection
    echo "Success";
    // Redirect::route('home');
  }else{
    // Renvoye des erreurs
    $errors = $form->get_errors();

    var_dump($errors);
  }
}

?>
