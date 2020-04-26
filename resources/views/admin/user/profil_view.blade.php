<div class="section section-about">
  <div class="section-box">
    <div class="profile">
      <div class="row">
        <div class="col-sm-12 col-md-5 mb-3">
          <div class="profile-photo d-flex justify-content-center">
            <div class="border" style="width:200px; height:200px; background:#eee"></div>
          </div>
        </div>
        <div class="col-sm-12 col-md-7">
          <div class="profile-info">
            <h1 class="profile-title text-dark">
              <?= $user_visited->nom ?> <?= $user_visited->prenom ?>
            </h1>
            <div class="profile-position"> Promotion:
              <?= $user_visited->get_promo() ?>
            </div>
          </div>
          <ul class="profile-list">
            <li class="clearfix">
              <strong class="title">Date Inscription</strong>
              <span class="cont">
                <?= $user_visited->date_inscription ?>
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Université/Ecole</strong>
              <span class="cont">
                <?php if(empty($user_visited->universite)): ?>
                  Lycée Classique d'Abidjan
                <?php else: ?>
                  <?= $user_visited->universite ?>
                <?php endif ?>
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Emploi</strong>
              <span class="cont">
                <?php if(empty($user_visited->emploi)): ?>
                  Etudiant
                <?php else: ?>
                  <?= $user_visited->emploi ?>
                <?php endif ?>
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Pays</strong>
              <span class="cont"><?= Country::get($user_visited->pays) ?></span>
            </li>
            <li class="clearfix">
              <strong class="title">Ville</strong>
              <span class="cont"><?= $user_visited->ville ?>, <?= $user_visited->commune ?></span>
            </li>
            <li class="clearfix">
              <strong class="title">E-mail</strong>
              <span class="cont"><?= $user_visited->email ?></span>
            </li>
            <li class="clearfix">
              <strong class="title">Téléphone</strong>
              <span class="cont"><?= $user_visited->numero ?></span>
            </li>
          </ul>
          <div class="text-right mt-4">
            <a id="btn-delete-user" class="btn btn-danger" href="#delete">Supprimer</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
