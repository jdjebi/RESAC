<?php

  require "src/init.php";

  if(Auth::check()){
    $user =  Users::auth();
  }

  $users = [];

  $profile_url = route("profil")."?id=";

  foreach (Users::all() as $u) {
    $users[] = [
      "id" => $u->id,
      "nom" => $u->nom,
      "prenom" => $u->prenom,
      "email" => $u->email,
      "profil_url" => $profile_url.$u->id
    ];
  };

  $users_json = json_encode($users);

  require "views/explorer.view.php";
?>
