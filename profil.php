<?php

require "src/init.php";

require "middleware/auth.php";

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

require "views/profil.view.php";

?>
