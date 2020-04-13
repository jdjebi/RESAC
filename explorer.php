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
      "promo" => $u->promo1.'-'.$u->promo2,
      "pays" => Country::get($u->pays),
      "ville" => $u->ville,
      "profil_url" => $profile_url.$u->id
    ];
  };

  $users_json = json_encode($users);

  require "views/explorer.view.php";
?>
