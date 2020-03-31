<?php require "views/partials/header.php" ?>
<?php require "views/partials/nav.php" ?>

<div class="container text-center mt-3">
  <?php require "views/partials/flash.php" ?>
</div>

<div class="container mt-4">
  <h2>Modifications</h2>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
      <div class="card-header">Informations personnelles</div>
      <div class="card-body">
        <form method="post">
          <?php if(isset($FormInfo->errors)): ?>
            <?php if(isset($FormInfo->errors["required"])): ?>
              <div class="alert alert-danger">
                Remplissez tous les champs avant d'envoyer le formulaire.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif ?>
          <?php endif ?>
          <div class="form-group">
            <label for="nom">Nom:</label>
            <input class="form-control" type="text" name="nom" value="<?= $FormInfo->get("nom") ?>" id="nom">
          </div>
          <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input class="form-control" type="text" name="prenom" value="<?= $FormInfo->get("prenom") ?>" id="prenom">
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input class="form-control" type="text" name="email" value="<?= $FormInfo->get("email") ?>" id="email">
          </div>
          <button class="btn btn-primary" type="submit" name="change_infos">Envoyer</button>
        </form>
      </div>
    </div>
    </div>
    <div class="col-md-6">
      <div class="card">
      <div class="card-header">Modification du mot de passe</div>
      <div class="card-body">
        <form method="post">
          <?php if(isset($FormPass->errors)): ?>
            <?php if(isset($FormPass->errors["required"])): ?>
              <div class="alert alert-danger">
                Remplissez tous les champs avant d'envoyer le formulaire.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif ?>
          <?php endif ?>
          <div class="form-group">
            <label for="password1">Confirmer votre mot de passe:</label>
            <input class="form-control" type="password" name="password1" id="password1">
          </div>
          <div class="form-group">
            <label for="password2">Nouveau mot de passe:</label>
            <input class="form-control" type="text" name="password2" id="password2">
          </div>
          <div class="form-group">
            <label for="password3">Confirmer le mot de passe:</label>
            <input class="form-control" type="password" name="password3" id="password3">
          </div>
          <button class="btn btn-primary" type="submit" name="change_pass">Envoyer</button>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>

<?php require "views/partials/footer.php" ?>
