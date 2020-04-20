

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
  <?php echo $__env->make('flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
</div>
<div class="container mt-5">
  <div class="text-center">
    <h1>Bienvenue sur RESAC</h1>
    <div class="text-center">
      <p>La plate-forme du Réseau des Anciens Caïmans</p>
      <div class="pt-3">
        <a class="btn btn-primary btn-md" href="<?= route('register') ?>" role="button">S'inscrire</a>
        <a class="btn btn-primary btn-md" href="<?= route('explorer') ?>" role="button">Annuaire des caïmans</a>
      </div>
    </div>
  </div>
  <div class="container">
    <?php echo $__env->make("news.last", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</div>
<?php $__env->stopSection(); ?>
kouassi@gmail.com

<?php echo $__env->make('page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tidev\Documents\dev3\resac\views\blade/index.blade.php ENDPATH**/ ?>