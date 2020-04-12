<?php  require "views/partials/header.php"; ?>
<?php  require "views/partials/nav.php"; ?>

<div class="container">

  <?php "views/partials/flash.php" ?>

  <div class="jumbotron mt-5">
    <h1 class="display-4">Youco</h1>
    <hr>
    <p class="lead">Les micros portofolios à votre service.</p>
    <a class="btn btn-primary btn-lg" href="<?= $register ?>" role="button">Commencer</a>
    <p>Youco vous permet de conserver votre identité afin que d'autres personne puissent aisement vous retrouver.</p>
  </div>
</div>

<?php  require "views/partials/footer.php"; ?>
