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
              <h2 class="profile-position">Promotion: <?= $user->promo1 ?> - <?= $user->promo2 ?></h2>
            </div>
            <ul class="profile-list">
              <li class="clearfix">
                <strong class="title">Pays</strong>
                <span class="cont"><?= Country::get($user->pays) ?></span>
              </li>
              <li class="clearfix">
                <strong class="title">Ville</strong>
                <span class="cont"><?= $user->ville ?>, <?= $user->commune ?></span>
              </li>
              <li class="clearfix">
                <strong class="title">E-mail</strong>
                <span class="cont"><?= $user->email ?></span>
              </li>
              <li class="clearfix">
                <strong class="title">Téléphone</strong>
                <span class="cont"><?= $user->numero ?></span>
              </li>
            </ul>
            <div class="text-right">
              <a class="btn btn-primary" href="<?= route('edit') ?>"><i class="fa fa-edit"></i> Mettre à jour</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
