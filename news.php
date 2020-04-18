<?php

require "src/init.php";

$user = Users::auth();

$title2 = "Nouveautés";

render('news.news',[
  'user' => $user
])
?>
