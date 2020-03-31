<?php require "views/partials/header.php"; ?>
<?php require "views/partials/nav.php" ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <?php require "views/partials/flash.php" ?>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-12">
      <h2>Modifications</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Informations personnelles
        </div>
        <div class="card-body">
          <?php if(isset($FormInfo->errors)): ?>

            <?php if(isset($FormInfo->errors["required"])): ?>
              <div class="alert alert-danger">
                Veuiller remplir tous les champs.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif ?>
          <?php endif ?>
          <form method="post">

            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" value="<?= $FormInfo->get("nom") ?>" name="nom" value="" id="nom">
            </div>

            <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" class="form-control" value="<?= $FormInfo->get("prenom") ?>" name="prenom" value="" id="prenom">
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" value="<?= $FormInfo->get("email") ?>" name="email" value="" id="email">
            </div>

            <button type="submit" class="btn btn-primary" name="change_info">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Mot de passe
        </div>
        <div class="card-body">
          <?php if(isset($FormPass->errors)): ?>

            <?php if(isset($FormPass->errors["required"])): ?>
              <div class="alert alert-danger">
                Veuiller remplir tous les champs.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif ?>

            <?php if(isset($FormPass->errors["global"])): ?>
              <div class="alert alert-danger">
                <?= $FormPass->errors["messages"]["global"] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif ?>

          <?php endif ?>
          <form method="post">

            <div class="form-group">
              <label for="pass">Confirmer votre mot de passe</label>
              <input type="password" class="form-control" value="<?= $FormInfo->get("pass") ?>" name="pass" value="" id="nom">
            </div>

            <div class="form-group">
              <label for="nw_pass">Nouveau mot de passe</label>
              <input type="text" class="form-control" value="<?= $FormInfo->get("nw_pass") ?>" name="nw_pass" value="" id="nw_pass">
            </div>

            <div class="form-group">
              <label for="conf_pass">Confirmer le mot de passe</label>
              <input type="password" class="form-control" value="<?= $FormInfo->get("conf_pass") ?>" name="conf_pass" value="" id="conf_pass">
            </div>

            <button type="submit" class="btn btn-primary" name="change_pass">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "views/partials/footer.php" ?>
