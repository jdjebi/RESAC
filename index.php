<?php

require "src/init.php";

require "middleware/guest.php";

render("index",[
  'title2' => "Bienvenue"
]);

?>
