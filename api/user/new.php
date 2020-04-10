<?php

require __DIR__."/../../src/init.php";

$form = new RegisterForm($_POST);
$success = false;

if($_POST){
  // Validation
  if($form->is_validate()){

    // Enregistrement
    $data = $form->get_data();

    if($data['password'] == $data['conf_password']){

      $success = true;

    }else{
      $data['password'] = '';
      $data['conf_password'] = '';
      $form->add_error('password',"Les mots de passe sont différents.");
    }

    $data = [
      "nom" => $data["nom"],
      "prenom" => $data["prenom"],
      "email" => $data["email"],
      "password" => crypt_password($data["password"])
    ];

    $user = Users::create($data);

  }else{
    $data = $form->get_data();
    $errors = $form->get_errors();
  }
}

$json_data = [
  "success" => $success,
  "clear_data" => $data,
  "errors" =>  $form->get_errors()
];

echo json_encode($json_data);

?>
