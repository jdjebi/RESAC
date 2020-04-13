<?php require "views/partials/header.php" ?>

<?php require "views/partials/nav.php" ?>

<div class="container mt-5">
  <?php require "views/partials/flash.php" ?>
</div>

<div class="container mt-5">

  <?php if($form->errors): ?>
  <div class="alert alert-danger">

    <?php if(isset($form->errors["required"])): ?>

      Veuiller remplir tous les champs.

    <?php elseif(isset($form->errors["login_failed"])): ?>

      Adresse E-mail ou mot de passe incorrecte.

    <?php endif ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>

  </div>
  <?php endif ?>

  <form method="post">
    <h3 class="mt-3 mb-4">Connexion</h3>
    <hr>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input class="form-control" type="text" value="<?= $form->get("email") ?>" name="email" id="email">
    </div>

    <div class="form-group">
      <label for="password">Mot de passe:</label>
      <input class="form-control" type="password" name="password" id="password">
    </div>

    <button class="btn btn-primary" type="submit" name="button">Envoyer</button>
    Pas de compte ? <a href=" <?= route("register") ?> ">Créer un compte</a>.
  </form>

</div>

<?php  require "views/partials/scripts.php"; ?>
<?php  require "views/partials/footer.php"; ?>
