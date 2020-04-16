<?php

require "src/init.php";

require "middleware/auth_back.php";

$user = Users::auth();

$show_portofolio = false;

if(isset($_GET['id']) && !empty($_GET['id'])){

  $id = $_GET['id'];

  $user_visited = Users::get($id);

  if(!$user_visited){
    Flash::add("Utilisateur introuvable","danger");
    Redirect::back("explorer");
  }

  $show_portofolio = true;
}

$title =  $user->nom.' '.$user->prenom;

if($show_portofolio)
  $title =  $user_visited->nom.' '.$user_visited->prenom;

require "views/profil.view.php";

?>
