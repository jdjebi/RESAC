@extends('page')


@section('content')

<div class="container mt-5">

<?php if(isset($errors)): ?>

  <?php if(isset($errors["required"])): ?>
    <div class="alert alert-danger">
      Veuiller remplir tous les champs.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif ?>
<?php endif ?>

<form method="post">
  <h3 class="mt-3 mb-4">Créer votre compte pour commencer</h3>
  <hr>
  <div class="form-group">
    <label for="nom">Nom:</label>
    <input class="form-control" type="text" name="nom" value="<?= $form->get("nom") ?>" id="nom">
  </div>

  <div class="form-group">
    <label for="prenom">Prénom:</label>
    <input class="form-control" type="text" name="prenom" value="<?= $form->get("prenom") ?>" id="prenom">
  </div>

  <div class="form-group">
    <label for="email">E-mail:</label>
    <input class="form-control <?= $form->isset('emails','email') ? 'is-invalid' : '' ?>" type="text" name="email" value="<?= $form->get("email") ?>" id="email">
    <span class="text-danger">
      <?= $form->get_error('emails','email') ?>
      <?= $form->get_error('uniques','email') ?>
    </span>
  </div>

  <div class="form-group">
    <label for="password">Mot de passe:</label>
    <input class="form-control <?= $form->isset('equals','password') ? 'is-invalid' : '' ?>" type="password" name="password" value="" id="password">
    <span class="text-danger"><?= $form->get_error('equals','password') ?></span>
  </div>

  <div class="form-group">
    <label for="conf_password">Confirmation du mot de passe:</label>
    <input class="form-control" type="password" name="conf_password" value="" id="conf_password">
  </div>

  <div class="">
    <button class="btn btn-primary" type="submit" name="button">Envoyer</button>
    Déjà un compte ? <a href="<?= route("login") ?>">Connectez vous</a>.
  </div>
</form>

</div>


@endsection
