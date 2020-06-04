<?php

namespace Resac;

use Illuminate\Support\Facades\Hash;


function authenticate($email,$password){
  /*
    Cette fonction vérifie si un utilisateur peut capble de se connecter.
    Elle vérifie la connexion avec plusieurs formes de hashage de mot de passe au cas où la fonction de hashage du mot de passe est modifiée
  */

  # Tentative avec le mot de passe hashé avec sha1
  $sha1_hashed_password = sha1($password);
  $user = \App\User::where('email', $email)->where('password',$sha1_hashed_password)->first();

  # Tentative avec la connexion de Laravel
  if (\Illuminate\Support\Facades\Auth::attempt(['email' => $email, 'password' => $password])) {
    $user = \App\User::where('email', $email)->first();
  }

  return $user;

}

function login($request,$user){
  /*
    Assure la connexion de l'utilisateur
  */

  # Varaibles de connexion du Framework built-in
  $_SESSION["user"] = $user->id;
  $_SESSION["is_staff"] = $user->is_staff;
  $_SESSION["staff_role"] = $user->staff_role;

  # Connexion Effective avec Laravel
  \Illuminate\Support\Facades\Auth::login($user,true);

  account_update($request,$user);

}

function logout(){
  # Déconnexion avec le Framework built-in
  unset($_SESSION["user"]);
  unset($_SESSION["is_staff"]);
  unset($_SESSION["staff_role"]);

  # Déconnexion avec le Framework built-in
  \Illuminate\Support\Facades\Auth::logout();
}

function account_update($request,$user){
  /*
    Assure la mise à jour du compte de l'utilisateur
  */

  $account_version = $user->version;

  if($account_version < 2){
    # Migration du hashage du mot de passe sha1 vers un hashage sh256 géré par Laravel
    $user->password = Hash::make($request->password);
    $user->version = 2;
    $user->save();
  }
}

?>
