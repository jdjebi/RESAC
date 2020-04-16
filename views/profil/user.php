<div class="container">
  <div class="section section-about">
    <div class="section-box">
      <div class="profile">
        <div class="row">
          <div class="col-sm-12 col-md-5 mb-3">
            <div class="profile-photo d-flex justify-content-center">
              <div class="border" style="width:299px; height:347px; background:#eee"></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="profile-info">
              <div class="profile-items clearfix">

              </div>
              <h1 class="profile-title text-dark">
              <?= $user->nom ?> <?= $user->prenom ?>
              </h1>
              <h2 class="profile-position">Promotion:
                <span>
                  <?php if(empty($user->pays)): ?>
                    <a style="font-size: 15px" href="<?= route("param") ?>#promo1"><i class="fa fa-plus"></i> Ajouter une promotion</a>
                  <?php else: ?>
                    <?= $user->promo1 ?> - <?= $user->promo2 ?>
                  <?php endif ?>
                </span>
              </h2>
            </div>
            <ul class="profile-list">
              <li class="clearfix">
                <strong class="title">Université/Ecole</strong>
                <span class="cont">
                  <?php if(empty($user->universite)): ?>
                    Lycée Classique d'Abidjan
                  <?php else: ?>
                    <?= $user->universite ?>
                  <?php endif ?>
                </span>
              </li>
              <li class="clearfix">
                <strong class="title">Emploi</strong>
                <span class="cont">
                  <?php if(empty($user->emploi)): ?>
                    Etudiant
                  <?php else: ?>
                    <?= $user->emploi ?>
                  <?php endif ?>
                </span>
              </li>
              <li class="clearfix">
                <strong class="title">Pays</strong>
                <span class="cont">

                  <?php if(empty($user->pays)): ?>
                    <a href="<?= route("param") ?>#pays"><i class="fa fa-plus"></i> Ajouter un pays</a>
                  <?php else: ?>
                    <?= Country::get($user->pays) ?>
                  <?php endif ?>

                </span>
              </li>
              <li class="clearfix">
                <strong class="title">Ville</strong>
                <span class="cont">
                  <?php if(empty($user->ville) && empty($user->commune)): ?>
                    <a href="<?= route("param") ?>#ville"><i class="fa fa-plus"></i> Ajouter une ville</a>
                  <?php elseif(empty($user->commune)): ?>
                    <?= $user->ville ?>
                  <?php else: ?>
                    <?= $user->ville ?>, <?= $user->commune ?>
                  <?php endif ?>
                </span>
              </li>
              <li class="clearfix">
                <strong class="title">E-mail</strong>
                <span class="cont"><?= $user->email ?></span>
              </li>
              <li class="clearfix">
                <strong class="title">Téléphone</strong>
                <span class="cont">

                  <?php if(empty($user->numero)): ?>
                    <a href="<?= route("param") ?>#numero"><i class="fa fa-plus"></i> Ajouter un numéro</a>
                  <?php else: ?>
                      <?= $user->numero ?>
                  <?php endif ?>

                </span>
              </li>
            </ul>
            <div class="text-right mt-4">
              <a class="btn btn-primary" href="<?= route('edit') ?>"><i class="fa fa-edit"></i> Mettre à jour</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
