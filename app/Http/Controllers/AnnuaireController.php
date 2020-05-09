<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class AnnuaireController extends Controller
{

    public function __invoke()
    {
      $user = null;

      if(\Auth::check()){
        $user =  \Users::auth();
      }

      $profile_url = route("profil")."?id=";

      $users = [];

      foreach (\Users::all() as $u) {
        $users[] = [
          "id" => $u->id,
          "photo" => $u->get_photo(),
          "nom" => $u->nom,
          "prenom" => $u->prenom,
          "emploi" => (empty($u->emploi)) ? "Lycée Classique d'Abidjan" : $u->emploi,
          "universite" => (empty($u->universite)) ? "Etudiant" : $u->universite,
          "email" => $u->email,
          "promo" => (empty($u->promo1) ? "xxxx-xxxx" : $u->promo1.'-'.$u->promo2),
          "pays" => \Country::get($u->pays),
          "ville" => $u->ville,
          "profil_url" => $profile_url.$u->id
        ];
      };

      $users_json = json_encode($users);

      $title2 = "Annuaire";

      return view('app.explorer.annuaire',[
        'user' => $user,
        'title2' =>  $title2,
        'profile_url' => $profile_url,
        'users_json' => $users_json
      ]);

    }
}

?>
