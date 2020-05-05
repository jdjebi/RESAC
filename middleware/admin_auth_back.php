<?php
  $redirect_url = route("admin")."?redirect=". $CURRENT_URL;

  if(!Auth::is_admin_logged()){
    Flash::add("Vous devez être connecté pour avoir accès à cette page.","warning");
    Redirect::url($redirect_url);
  }
?>
