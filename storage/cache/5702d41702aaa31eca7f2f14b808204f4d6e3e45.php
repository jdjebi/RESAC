

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12 col-md-5 col-lg-3">

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

    <div class="col-sm-12 col-md-7 col-lg-8">
      <div class="m-2">
        <?php echo $__env->make('flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>

      <?php if($edit_form == "infos"): ?>
        <div id="infos-form">
          <?php require "views/params/infos.php"; ?>
        </div>
      <?php endif; ?>

      <?php if($edit_form == "password"): ?>
        <?php require "views/params/pass.php"; ?>
      <?php endif ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tidev\Documents\dev3\resac\views\blade/params/edit.blade.php ENDPATH**/ ?>