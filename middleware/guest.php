<?php
  if(Auth::check()){
    Redirect::route("profil");
  }
?>
