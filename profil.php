<?php

require "src/init.php";


$user = Users::auth();

if(exist($_GET['id'])){

  $id = $_GET['id'];

  $user_visited = Users::get($id);

  if(!$user_visited){
    Flash::add("Utilisateur introuvable","danger");
    Redirect::route("explorer");
  }else{
    echo "porto";
  }

}

require "views/profil.view.php";

?>
