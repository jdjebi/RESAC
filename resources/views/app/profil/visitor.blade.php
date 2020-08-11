<div class="container">
  <div class="section section-about">
    <div class="section-box">
      <div class="profile">
        <div class="row">
          <div class="col-sm-12 col-md-5 mb-3">
            <div class="profile-photo d-flex justify-content-center">
              <div class="d-flex justify-content-center align-items-center" style="width:299px; height:347px;">
                <div class="resac-w-200 resac-h-200">
                  <img class="rounded resac-w-200 resac-h-200" src="{{ asset("$user_visited->photo") }}" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="profile-info">
              <div class="profile-items clearfix">
                <div class="profile-preword text-dark">
                  <span>Hello</span>
                </div>
              </div>
              <h1 class="profile-title text-dark">
                <span>Je suis</span> <?= $user_visited->nom ?> <?= $user_visited->prenom ?>
              </h1>
              <h2 class="profile-position">Promotion:
                <?php if(!empty($user_visited->promo1)): ?>
                  <?= $user->promo1 ?> - <?= $user_visited->promo2 ?>
                <?php else: ?>
                  xxxx-xxxx
                <?php endif ?>
              </h2>
            </div>
            <ul class="profile-list">
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
