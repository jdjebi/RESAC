

<?php $__env->startSection('extras_style'); ?>
  <?php echo $__env->make('profil.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
  <?php echo $__env->make("flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
</div>

<?php if ($show_portofolio): ?>

  <?php require "views/profil/visitor.php" ?>

<?php else: ?>

  <?php require "views/profil/user.php" ?>

<?php endif ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tidev\Documents\dev3\resac\views\blade/profil.blade.php ENDPATH**/ ?>