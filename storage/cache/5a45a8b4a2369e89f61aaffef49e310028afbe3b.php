

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
  <?php echo $__env->make('flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="container mt-5">
  <div class="row">
    <div class="offset-md-2 col-md-8 offset-lg-3 col-lg-5">
      <form action="<?php echo e($redirect_url); ?>" method="post">
        <h3 class="mt-3 mb-4 text-center">Connexion</h3>
        <?php if($form->errors): ?>
        <div class="alert alert-danger">
          <?php if(isset($form->errors["required"])): ?>
            Veuiller remplir tous les champs.
          <?php elseif(isset($form->errors["login_failed"])): ?>
            Adresse E-mail ou mot de passe incorrecte.
          <?php endif; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input class="form-control" type="text" value="<?php echo e($form->get("email")); ?>" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe:</label>
          <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="mt-4">
          <button class="btn btn-primary" type="submit" name="button">Envoyer</button>
          Pas de compte ? <a href="<?php echo e(route("register")); ?>">Créer un compte</a>.
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tidev\Documents\dev3\resac\views\blade/connexion.blade.php ENDPATH**/ ?>