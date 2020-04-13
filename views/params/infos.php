<div class="card m-2">
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
        <label for="nom">Nom*</label>
        <input type="text" class="form-control" value="<?= $FormInfo->get("nom") ?>" name="nom" value="" id="nom">
      </div>

      <div class="form-group">
        <label for="prenom">Prénom*</label>
        <input type="text" class="form-control" value="<?= $FormInfo->get("prenom") ?>" name="prenom" id="prenom">
      </div>

      <div class="form-group">
        <label for="email">E-mail*</label>
        <input type="text" class="form-control" value="<?= $FormInfo->get("email") ?>" name="email" id="email">
      </div>

      <div class="form-group">
        <label for="numero">Numéro de téléphone</label>
        <input type="text" class="form-control" value="<?= $FormInfo->get("numero") ?>" name="numero" id="numero">
      </div>

      <h5 class="mt-5">Lieu d'habitation actuel</h5>
      <hr>

      <div class="form-row">

        <div class="col-md-4 mb-3">
          <label for="pays">Pays</label>
          <select class="form-control" name="pays" value="" id="pays">
            <option value="<?= $FormInfo->get('pays') ?>" selected><?= Country::get($FormInfo->get("pays")) ?></option>
            <option v-for="(country, code) in countries" v-bind:value="code">{{ country }}</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label for="ville">Ville</label>
          <input type="text" name="ville" class="form-control" id="ville" value="<?= $FormInfo->get('ville') ?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="commune">Commune &middot Quartier</label>
          <input type="text" name="commune" class="form-control" id="commune" value="<?= $FormInfo->get('commune') ?>">
        </div>

      </div>

      <h5 class="mt-5">Mon parcours &middot Promotion</h5>
      <hr>

      <div class="form-row">

        <div class="col-md-6 mb-3">
          <label for="promo1">Année de début</label>
          <input type="number" min="1970" max="2021" name="promo1" class="form-control" id="promo1" value="<?= $FormInfo->get("promo1") ?>">
        </div>

        <div class="col-md-6 mb-3">
          <label for="promo2">Année de fin</label>
          <input type="number"  min="1970" max="2021" name="promo2" class="form-control" id="promo2" value="<?= $FormInfo->get("promo2") ?>">
        </div>

      </div>
      <div class="">
        <p><small><b>Les champs marqués du caractère * sont obligatoires.</b></small></p>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-primary" name="change_info">Envoyer</button>
      </div>
    </form>
  </div>
</div>