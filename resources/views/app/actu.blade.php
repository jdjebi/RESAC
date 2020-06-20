@extends('app.page')

@section('extras_style')
<link rel="stylesheet" href="asset/css/placeholder-loading.min.css">
<link rel="stylesheet" href="{{ asset("asset/css/resac/pubs.css") }}">
<style media="screen">
  body{
    background-color: #f1f3f6
  }
</style>
@endsection

@section('content')

<div class="container-fluid mt-3">

  <div class="row">

    <div class="col-md-2 offset-lg-1 d-none d-lg-block offset-sm-2">

      @include('app.feed.left')

    </div>

    <div class="col-sm-12 col-md-8 col-lg-5">

      @include('flash')

      <div class="post-box" id="post-box-v1">
        <form action="" method="post">
          @csrf
          <div class="box border bg-white">
              <div class="header pl-4 pt-3 pb-3">
                <div class="header-post-message">
                  <i class="fa fa-edit"></i> Publication
                </div>
              </div>
              <div class="body pl-4 pr-4 pb-3">
                <textarea class="form-control" id="post-area" rows="3" name="content" placeholder="Exprimez vous..."></textarea>
              </div>
              <div class="footer p-2 pr-4 border-top text-right">
                <button class="btn btn-sm btn-primary" type="submit" name="new_post">Publier</button>
              </div>
          </div>
        </form>
      </div>

      <div class="separator mt-3"></div>

      <div id="feed">

        @foreach ($feed_posts as $key => $post)

          <div class="pub-box" id="">
              <div class="box border bg-white mb-3">
                  <div class="header pl-4 pt-3 pb-3 pr-4">
                    <div class="media">
                      <a title="{{ $post->user->get_complete_name() }}" href="{{ route('profil') }}?id={{ $post->user_id  }}">
                      <img class="pub-user-photo" src="{{ $post->user->get_photo() }}" alt="Photo {{ $post->user->get_complete_name() }}">
                      </a>
                      <div class="ml-3 media-body">

                        <div class="dropdown float-right">
                          <a class="dropdown-toggle" href="#" role="button" id="pub-box-menu-option-{{ $post->id }}" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                            <i class="text-muted fa fa-ellipsis-h"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="pub-box-menu-option-{{ $post->id }}">
                            <h6 class="dropdown-header">Options</h6>
                            @if($post->user_id != $user->id && false)
                            <a class="dropdown-item" href="#"><i class="far fa-check-circle"></i> &nbsp; Marquer comme lu</a>
                            @endif

                            @if($post->user_id == $user->id)
                            <a class="dropdown-item" href="?origin=feed&delete={{ $post->id }}"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                            @endif
                          </div>
                        </div>

                        <div class="mt-0 pub-user-name">
                          <a href="{{ route('profil') }}?id={{ $post->user_id }}">
                            {{ $post->user->get_complete_name() }}
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

    <div id="annonce" class="col-sm-4 d-none d-md-block d-lg-block">
      @include('app.feed.annonce')
    </div>

  </div>


</div>

@endsection

@section('scripts')
<script type="module" src="asset/js/resac/init.timeago.js"></script>
<script src="{{ asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ asset("asset/js/resac/vue.truncate_filter.js") }}" type="text/javascript"></script>
@endsection
