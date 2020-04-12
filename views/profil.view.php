<?php  require "views/partials/header.php"; ?>
<?php  require "views/partials/nav.php"; ?>

<?php if ($show_portofolio): ?>

  <div class="container mt-5">
    <div class="d-flex justify-content-center">
      <div class="card border border-info" style="max-width: 18rem;">
        <div class="card-header d-flex justify-content-between text-white bg-info">
          <div class="">
            Mini portofolio
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-center mb-3">
            <div class="u-photo">
              <div class="eye u-photo-eye1"></div>
              <div class="eye u-photo-eye2"></div>
            </div>
          </div>
          <div class="">
            Nom: <?= $user_visited->nom ?>
          </div>
          <div class="">
            Prénom: <?= $user_visited->prenom ?>
          </div>
          <div class="">
            E-mail: <?= $user_visited->email ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>

  <div class="container mt-5">
    <div class="d-flex justify-content-around flex-wrap">

      <div class="card m-2" style="max-width: 18rem;">
        <div class="card-header d-flex justify-content-between">
          <div class="">
            Mini portofolio
          </div>
          <div class="">
            <a href="<?= route("edit") ?>">Modifier</a>
          </div>
        </div>
        <div class="card-body">

          <div class="d-flex justify-content-center mb-3">
            <div class="u-photo">
              <div class="eye u-photo-eye1"></div>
              <div class="eye u-photo-eye2"></div>
            </div>
          </div>

          <hr>

          <div class="">
            Nom: <?= $user->nom ?>
          </div>
          <div class="">
            Prénom: <?= $user->prenom ?>
          </div>
          <div class="">
            E-mail: <?= $user->email ?>
          </div>
          <div class="">
            Téléphone: <?= $user->numero ?>
          </div>

          <h6 class="mt-4">Lieu d'habitation actuel</h6>
          <hr>
          <div class="">
            Pays: <?= $user->pays ?>
          </div>

          <h6 class="mt-4">Liens</h6>
          <hr>
          <div class="">
            Mwaou: <?= $user->mwaou ?>
          </div>
        </div>
      </div>

      <div class="card m-2" style="width: 35rem;">
        <div class="card-header d-flex justify-content-between">
          <div class="">
          Confidentialié des données
          </div>
          <div class=""><a href="#" title="Contrôler la confidentialité de vos données en activant ou en désactivant leur visibilité.">?</a></div>
        </div>


        <div class="card-body">


          <ul class="list-group list-group-flush">



            <li class="list-group-item d-flex justify-content-between align-items-center">
              <label for="numero">Numéro</label>
              <div class="custom-control custom-switch">
                <input type="checkbox" checked class="custom-control-input" id="numero">
                <label class="custom-control-label" for="numero"></label>
              </div>
            </li>


            <li class="list-group-item d-flex justify-content-between align-items-center">
              Pays actuel
              <div class="custom-control custom-switch">
                <input type="checkbox" checked class="custom-control-input" id="pays">
                <label class="custom-control-label" for="pays"></label>
              </div>
            </li>


            <li class="list-group-item d-flex justify-content-between align-items-center">
              Mwaou
              <div class="custom-control custom-switch">
                <input type="checkbox" checked class="custom-control-input" id="mwaou">
                <label class="custom-control-label" for="mwaou"></label>
              </div>
            </li>


            <li class="list-group-item d-flex justify-content-between align-items-center">
              Linkedin
              <div class="custom-control custom-switch">
                <input type="checkbox" checked class="custom-control-input" id="linkedin">
                <label class="custom-control-label" for="linkedin"></label>
              </div>
            </li>



          </ul>
          <div class="mt-3 text-right">
            <button class="btn btn-sm btn-primary" type="button" name="button">
              Enregistrer
            </button>
            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
          </div>
        </div>


      </div>

    </div>
  </div>

<?php endif ?>

<?php  require "views/partials/footer.php"; ?>
