<div class="bg-post">

  <div class="pub-box" id="">
      <div class="box border bg-white mb-3">
          <div class="header pl-4 pt-3 pb-3 pr-4">
            <div class="media">
              <a title="{{ $post->user->get_complete_name() }}" href="{{ route('profil') }}?id={{ $post->user_id  }}">
              <img class="pub-user-photo" src="{{ $post->user->get_photo() }}" alt="Photo {{ $post->user->get_complete_name() }}">
              </a>
              <div class="ml-3 media-body">
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
            {{ $post->content }}
          </div>
          <div class="footer p-2 pr-4 border-top text-right">

            @if(!$post->validate)

              <a class="btn btn-sm btn-success" href="{{ route('admin.validate_pub', $post->id) }}">Valider</a>

            @else

              <button class="btn btn-sm btn-danger"  href="{{ route('admin.validate_pub', $post->user_id) }}">Annuler la validation</button>

            @endif

          </div>
      </div>
  </div>

</div>
