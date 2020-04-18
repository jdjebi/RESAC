<?php

require "src/init.php";

require "middleware/auth_back.php";

$user = Users::auth();

$title =  "Actualités";

render("actu",[
  'title' => $title,
  'user' => $user,
]);

?>
