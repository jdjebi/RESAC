<?php
require "src/init.php";


for ($i=0; $i < 200; $i++) {
  $data = [
    "nom" => uniqid(),
    "prenom" => uniqid(),
    "email" => uniqid().'@youco.com',
    "password" => crypt_password("123"),
  ];

  Users::create($data);
}

?>

<strong>Utilisateur créé.</strong>
