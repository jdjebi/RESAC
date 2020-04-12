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
        <label for="numero">Numéro (facultatif)</label>
        <input type="text" class="form-control" value="<?= $FormInfo->get("numero") ?>" name="nuemro" value="" id="numero">
      </div>

      <button type="submit" class="btn btn-primary" name="change_info">Envoyer</button>
    </form>
  </div>
</div>
