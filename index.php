<?php

require "src/init.php";

if(Auth::check()){
  Redirect::route("profil");
}

require "views/index.view.php";

?>
