<?php
  if(!Auth::check()){
    Flash::add("Vous devez être connecté pour avoir accès à cette page.","warning");
    Redirect::route("login");
  }
?>
