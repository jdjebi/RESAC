<?php  require "views/partials/header.php"; ?>
<?php  require "views/partials/nav.php"; ?>

<div class="container">

  <?php "views/partials/flash.php" ?>

  <div class="jumbotron mt-5">
    <h1 class="display-4">Youco</h1>
    <hr>
    <p class="lead">La plateforme des micros portofolios.</p>
    <a class="btn btn-primary btn-lg" href="<?= $register ?>" role="button">Commencer</a>
  </div>
</div>

<?php  require "views/partials/footer.php"; ?>
