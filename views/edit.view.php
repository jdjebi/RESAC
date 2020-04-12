<?php require "views/partials/header.php"; ?>
<?php require "views/partials/nav.php" ?>

<div class="container mt-5">

  <div class="row">

    <div class="col-md-4">

      <ul class="list-group list-group-flush">


        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="<?= route('param') ?>?infos">Informations personnelles</a>
        </li>


        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="<?= route('param') ?>?password">Mot de passe</a>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="<?= route('param') ?>?privacy">Confidentialié</a>
        </li>


      </ul>

    </div>

    <div class="col-md-8">
      
      <?php require "views/partials/flash.php" ?>

      <?php if($edit_form == "infos"): ?>
        <?php require "views/params/infos.php"; ?>
      <?php endif ?>

      <?php if($edit_form == "password"): ?>
        <?php require "views/params/pass.php"; ?>
      <?php endif ?>

      <?php if($edit_form == "privacy"): ?>
        <?php require "views/params/privacy.php"; ?>
      <?php endif ?>

    </div>


  </div>



</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12"></div>
  </div>

  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6"></div>
  </div>
</div>

<?php require "views/partials/footer.php" ?>
