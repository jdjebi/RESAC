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

    </div>
  </div>

<?php endif ?>

<?php  require "views/partials/footer.php"; ?>
