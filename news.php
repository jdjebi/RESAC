<?php

require "src/init.php";

$user = null;

if(Auth::check())
  $user = Users::auth();

$title2 = "Nouveautés";

render('news.news',[
  'user' => $user
])
?>
