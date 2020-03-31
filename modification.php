<?php

require "src/init.php";

$user = Users::auth();

$FormInfo = new Form\User\Update\Info($_POST);
$FormPass = new Form\User\Update\Password($_POST);

$FormInfo->set_default([
  "nom" => $user->nom,
  "prenom" => $user->prenom,
  "email" => $user->email,
]);

if(isset($_POST["change_info"]) && $FormInfo->is_validate()){
  $data = $FormInfo->get_data();
  $user->nom = $data["nom"];
  $user->prenom = $data["prenom"];
  $user->email = $data["email"];
  $user->save();
  Flash::add("Modifications enregisrées.","success");
}elseif(isset($_POST["change_pass"]) && $FormPass->is_validate()) {
  $data = $FormPass->get_data();
  $password = crypt_password($data["pass"]);
  if($user->password == $password){
    if($data['nw_pass'] == $data['conf_pass']){
      $user->password = $data['nw_pass'];
      $user->save();
      Flash::add("Mot de passe mis à jour.","success");
    }else{
      $FormPass->add_error('global',"Les mots de passe sont différents.");
    }
  }else{
    $FormPass->add_error('global',"Mot de passe du compte incorrecte.");
  }
}

require "views/edit.view.php";
?>
