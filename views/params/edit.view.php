<?php require "views/partials/header.php"; ?>
<?php require "views/partials/nav.php" ?>

<div class="container mt-5">

  <div class="row">

    <div class="col-md-3">

      <ul class="list-group list-group-flush">


        <li class="list-group-item d-flex justify-content-between align-items-center">
          <i class="fa fa-address-card text-primary"></i> <a href="<?= route('param') ?>?infos">Informations personnelles</a>
        </li>


        <li class="list-group-item d-flex justify-content-between align-items-center">
          <i class="fa fa-key text-primary"></i> <a href="<?= route('param') ?>?password">Mot de passe</a>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
          <small class="text-muted">RESAC &middot Annuaire </small>
        </li>

      </ul>

    </div>

    <div class="col-md-8">

      <div class="m-2">
        <?php require "views/partials/flash.php" ?>
      </div>

      <?php if($edit_form == "infos"): ?>
        <div id="infos-form">
          <?php require "views/params/infos.php"; ?>
        </div>
      <?php endif ?>

      <?php if($edit_form == "password"): ?>
        <?php require "views/params/pass.php"; ?>
      <?php endif ?>

    </div>


  </div>



</div>

<?php require "views/partials/scripts.php" ?>

<script type="text/javascript" src="asset/js/vue.js"></script>

<script type="text/javascript">

  var infos_form_id = "#infos-form";
  var infos_form = $(infos_form_id);
  var json_countries = <?= $json_countries ?>;

  if(infos_form.length){

    infos_vm = new Vue({
      el: infos_form_id,
      data:{
        countries:json_countries
      }
    });

  }

</script>

<?php require "views/partials/footer.php" ?>
