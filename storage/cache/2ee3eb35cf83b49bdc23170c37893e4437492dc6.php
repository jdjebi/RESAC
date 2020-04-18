<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      <?php if(isset($title)): ?>
        <?php echo e($title); ?>

      <?php elseif(isset($title2)): ?>
        RESAC - <?php echo e($title2); ?>

      <?php else: ?>
        RESAC
      <?php endif; ?>
    </title>
    <link rel="stylesheet" href="asset/css/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/fontawsome/all.css">
    <?php echo $__env->yieldContent('extras_style'); ?>
  </head>
  <body>
    <?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <script src="asset/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
  </body>
</html>
<?php /**PATH C:\Users\Tidev\Documents\dev3\resac\views\blade/page.blade.php ENDPATH**/ ?>