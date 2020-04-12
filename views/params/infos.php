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

      <div class="form-group">
        <label for="numero">Numéro de téléphone(facultatif)</label>
        <input type="text" class="form-control" value="<?= $FormInfo->get("numero") ?>" name="numero" value="" id="numero">
      </div>

      <h5 class="mt-5">Lieu d'habitation actuel</h5>
      <hr>

      <div class="form-group">
        <label for="pays">Pays (facultatif)</label>
        <input type="text" class="form-control" value="<?= $FormInfo->get("pays") ?>" name="pays" value="" id="pays">
      </div>

      <button type="submit" class="btn btn-primary" name="change_info">Envoyer</button>
    </form>
  </div>
</div>
