<?php
  $redirect_url = route("login")."?redirect=". $CURRENT_URL;

  if(!Auth::check()){
    Flash::add("Vous devez être connecté pour avoir accès à cette page.","warning");
    Redirect::url($redirect_url);
  }
?>
