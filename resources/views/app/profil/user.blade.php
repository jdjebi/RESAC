<div class="container">
  <div class="resac-style-2 section section-about">
    <div class="section-box">
      <div class="profile">
        <div class="row">
          <div class="col-sm-12 col-md-5 mb-3">
            <div class="profile-photo d-flex justify-content-center">
              <div class="d-flex justify-content-center" style="width:299px; height:347px;">
                <div class="resac-w-200 resac-h-200">
                  <img class="rounded-circle border resac-w-200 resac-h-200" src="{{ photos_cdn_asset($user->photo) }}" alt="Photo de {{ $user->fullname }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="profile-info">
              <div class="profile-items clearfix">
              </div>
              <h1 class="profile-title text-dark">
              {{ $user->fullname }}
              </h1>
              <h2 class="profile-position">Promotion:
                <span>
                  @if(empty($user->pays))
                    <a style="font-size: 15px" href="{{ route("param") }}#promo1"><i class="fa fa-plus"></i> Ajouter une promotion</a>
                  @else
                    {{ $user->promo1 }} - {{ $user->promo2 }}
                  @endif
                </span>
              </h2>
            </div>
            <ul class="profile-list">
              <li class="clearfix">
                <strong class="title">Université/Ecole</strong>
                <span class="cont">
                  @if(empty($user->universite))
                    Lycée Classique d'Abidjan
                  @else
                    {{ $user->universite }}
                  @endif
                </span>
              </li>
              <li class="clearfix">
                <strong class="title">Emploi</strong>
                <span class="cont">
                  @if(empty($user->emploi))
                    Etudiant
                  @else
                    {{ $user->emploi }}
                  @endif
                </span>
              </li>
              <li class="clearfix">
                <strong class="title">Pays</strong>
                <span class="cont">
                  @if(empty($user->pays)): ?>
                    <a href="{{ route("param") }}#pays"><i class="fa fa-plus"></i> Ajouter un pays</a>
                  @else
                    {{ $user->pays }}
                  @endif
                </span>
              </li>
              <li class="clearfix">
                <strong class="title">Ville</strong>
                <span class="cont">
                  @if(empty($user->ville) && empty($user->commune))
                    <a href="{{ route("param") }}#ville"><i class="fa fa-plus"></i> Ajouter une ville</a>
                  @elseif(empty($user->commune))
                    {{ $user->ville }}
                  @elseif(empty($user->ville))
                    {{ $user->commune }}
                  @else
                    {{ $user->ville }}, {{ $user->commune }}
                  @endif
                </span>
              </li>
              <li class="clearfix">
                <strong class="title">E-mail</strong>
                <span class="cont">{{ $user->email }}</span>
              </li>
              <li class="clearfix">
                <strong class="title">Téléphone</strong>
                <span class="cont">
                  @if(empty($user->numero))
                    <a href="{{ route("param") }}#numero"><i class="fa fa-plus"></i> Ajouter un numéro</a>
                  @else
                      {{ $user->numero }}
                  @endif
                </span>
              </li>
            </ul>
            <div class="text-right mt-4">
              <a class="btn btn-primary" href="{{ route('edit') }}"><i class="fa fa-edit"></i> Mettre à jour</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
