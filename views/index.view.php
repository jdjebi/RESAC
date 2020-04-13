<?php  require "views/partials/header.php"; ?>
<?php  require "views/partials/nav.php"; ?>

<div class="container mt-5">

  <?php require "views/partials/flash.php" ?>

  <div class="text-center">
    <h1>Bienvenue sur RESAC</h1>
    <div class="text-center">
      <p>La plateforme du Réseau des Anciens Caïmans</p>

      <div class="pt-3">
        <a class="btn btn-primary btn-md" href="<?= route('register') ?>" role="button">S'inscrire</a>
        <a class="btn btn-primary btn-md" href="<?= route('explorer') ?>" role="button">Annuaire des caïmans</a>
      </div>

    </div>
  </div>
</div>
<div class="container">
  <?php  require "views/news/timeline.php"; ?>
</div>
<?php  require "views/partials/footer.php"; ?>
