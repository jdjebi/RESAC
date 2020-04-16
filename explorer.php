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
      "emploi" => (empty($u->emploi)) ? "Lycée Classique d'Abidjan" : $u->emploi,
      "universite" => (empty($u->universite)) ? "Etudiant" : $u->universite,
      "email" => $u->email,
      "promo" => (empty($u->promo1) ? "xxxx-xxxx" : $u->promo1.'-'.$u->promo2),
      "pays" => Country::get($u->pays),
      "ville" => $u->ville,
      "profil_url" => $profile_url.$u->id
    ];
  };

  $users_json = json_encode($users);

  $title2 = "Annuaire";
  require "views/explorer.view.php";
?>
