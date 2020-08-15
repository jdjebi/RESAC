<div class="container">
  <div class="resac-style-2 section section-about bg-white border rounded">
    <div class="section-box">
      <div class="profile">
        <div class="row">
          <div class="col-sm-12 col-md-4 mb-3">
            <div class="profile-photo d-flex justify-content-center">
              <div class="d-flex justify-content-center">
                <div class="resac-w-200 resac-h-200 text-center">
                  <img class="rounded-circle border resac-w-150 resac-h-150" src="{{ photos_cdn_asset($user_visited) }}" alt="Photo de {{ $user->fullname }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-8">
            <div class="profile-info">
              <div class="profile-items clearfix">
              </div>
              <h1 class="profile-title text-dark">
              {{ $user_visited->fullname }}
              </h1>
              <small class="profile-position">Promo
                <span>
                  @if(empty($user->pays))
                    xxxx-xxxx
                  @else
                    {{ $user_visited->promo1 }} - {{ $user_visited->promo2 }}
                  @endif
                </span>
              </small>
            </div>
            <div class="d-flex justify-content-between">
              <div>
                <ul class="profile-list">
                  <li class="clearfix">
                    <strong class="title">Université/Ecole</strong>
                    <span class="cont">
                      @if(empty($user_visited->universite))
                        Lycée Classique d'Abidjan
                      @else
                        {{ $user_visited->universite }}
                      @endif
                    </span>
                  </li>
                  <li class="clearfix">
                    <strong class="title">Emploi</strong>
                    <span class="cont">
                      @if(empty($user_visited->emploi))
                        Etudiant
                      @else
                        {{ $user_visited->emploi }}
                      @endif
                    </span>
                  </li>                  
                </ul>
              </div>
              <div>
                <ul class="profile-list">
                  <li class="clearfix">
                    <strong class="title">Pays</strong>
                    <span class="cont">
                      {{ Country::get($user_visited->code_pays) }}
                    </span>
                  </li>
                  <li class="clearfix">
                    <strong class="title">Ville</strong>
                    <span class="cont">
                      @if(empty($user_visited->commune))
                        {{ $user_visited->ville }}
                      @elseif(empty($user_visited->ville))
                        {{ $user_visited->commune }}
                      @else
                        {{ $user_visited->ville }}, {{ $user->commune }}
                      @endif
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container pt-3">
  <div class="row">
    <div class="col-md-4 mb-2">
      <div class="card">
        <div class="card-header">
          Contact
        </div>
        <div class="card-body">
          <ul class="profile-list">
            <li class="clearfix">
              <strong class="title">E-mail</strong>
              <span class="cont">{{ $user_visited->email }}</span>
            </li>
            <li class="clearfix">
              <strong class="title">Téléphone</strong>
              <span class="cont">
                {{ $user_visited->numero }}
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      @foreach ($posts as $key => $post)

        <div class="pub-box" id="">
          <div class="box border bg-white mb-3">
              <div class="header pl-4 pt-3 pb-3 pr-4">
                <div class="media">
                  <a title="{{ $post->user_object->fullname }}" href="{{ route('profil') }}?id={{ $post->user_object->id  }}">
                  <img class="pub-user-photo" src="{{ $post->user_object->photo }}" alt="Photo {{ $post->user_object->fullname }}">
                  </a>
                  <div class="ml-3 media-body">

                    <div class="dropdown float-right">
                      <a class="dropdown-toggle" href="#" role="button" id="pub-box-menu-option-{{ $post->id }}" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                        <i class="text-muted fa fa-ellipsis-h"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="pub-box-menu-option-{{ $post->id }}">
                        <h6 class="dropdown-header">Options</h6>
                        @if($post->user_object->id != $user->id && false)
                        <a class="dropdown-item" href="#"><i class="far fa-check-circle"></i> &nbsp; Marquer comme lu</a>
                        @endif

                        @if($post->user_object->id == $user->id)
                        <a class="dropdown-item" href="?origin=feed&delete={{ $post->id }}"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                        @endif
                      </div>
                    </div>

                    <div class="mt-0 pub-user-name">
                      <a href="{{ route('profil') }}?id={{ $post->user_object->id }}">
                        {{ $post->user_object->fullname }}
                      </a> &nbsp;
                      <span title="Publication {{ $post->validate ? "approuvée" : "non approuvée"}}" class="text-{{ $post->validate ? "success" : "danger"}}"><i class="fa fa-check-circle"></i></span>
                    </div>

                    <span class="text-muted small">
                      <span class="post-badge post-badge-info mr-1">INFORMATION</span>&nbsp;
                      <time class="timeago" datetime="{{ $post->date }}" title="{{ $post->date }}"> <i class="far fa-clock"></i></time>
                      &middot
                      <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> {{ $post->scope }}</span>
                    </span>

                  </div>
                </div>
              </div>
              <div class="body pl-4 pr-4 pb-3"><?= $post->content ?></div>
              @if($post->user_id != $user->id && false)
              <div class="footer p-2 pr-4 border-top text-right">
                <button disabled class="btn btn-sm btn-primary" type="button" name="button" title="Les publications marquées comme lu n'apparaitrons plus dans la fil.">Maquer comme lu</button>
              </div>
              @endif
          </div>
        </div>

      @endforeach

    </div>
  </div>
</div>
