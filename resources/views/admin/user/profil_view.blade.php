<div class="section section-about">
  <div class="section-box resac-linkedin-shadow">
    <div class="profile">
      <div class="row">
        <div class="col-sm-12 col-md-5 mb-3">
          <div class="profile-photo d-flex justify-content-center">
            <div class="text-center">
              <div>
                <img class="rounded-circle border resac-w-150 resac-h-150" src="{{ photos_cdn_asset($user_visited) }} " alt="">
              </div>
              <div class="text-center mt-4">
                {{ $user_visited->equipe }} &middot; {{ $user_visited->roles_alias }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-7">
          <div class="profile-info">
            <h1 class="profile-title text-dark">
              {{ $user_visited->fullname }} 
            </h1>
            <div class="profile-position"> Promotion:
              {{ $user_visited->promo }} 
            </div>
          </div>
          <ul class="profile-list">
            <li class="clearfix">
              <strong class="title">Date Inscription</strong>
              <span class="cont">
                {{ $user_visited->date_inscription }} 
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Université/Ecole</strong>
              <span class="cont">
                {{ $user_visited->universite }}    
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Emploi</strong>
              <span class="cont">
                {{ $user_visited->emploi }}   
              </span>
            </li>
            <li class="clearfix">
              <strong class="title">Pays</strong>
              <span class="cont">{{ $user_visited->pays }}   </span>
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
            <a href="{{ route("admin.users.account",$user_visited->id) }}" class="btn btn-primary"><i class="fa fa-cog"></i> Paramètre du compte</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
