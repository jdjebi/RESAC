<div class="bg-post">

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
                  <span title="Publication non validée" class="text-danger"><i class="fa fa-check-circle"></i></span>
                </div>

                <span class="text-muted small">
                  <time class="timeago" datetime="{{ $post->date }}" title="{{ $post->date }}"> <i class="far fa-clock"></i></time>
                  &middot
                  <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> {{ $post->scope }}</span>
                </span>

              </div>
            </div>
          </div>
          <div class="body pl-4 pr-4 pb-3">
            <?= $post->content ?>
          </div>
          @if($post->user_id != $user->id && false)
          <div class="footer p-2 pr-4 border-top text-right">
            <button disabled class="btn btn-sm btn-primary" type="button" name="button" title="Les publications marquées comme lu n'apparaitrons plus dans la fil.">Maquer comme lu</button>
          </div>
          @endif
      </div>
  </div>

</div>
