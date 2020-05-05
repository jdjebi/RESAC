<div class="bg-post">

  <div class="pub-box" id="">
      <div class="box border bg-white mb-3">
          <div class="header pl-4 pt-3 pb-3 pr-4">
            <div class="media">
              <a title="{{ $post->user->get_complete_name() }}" href="{{ route('admin_user_profil',$post->user_id) }}">
              <img class="pub-user-photo" src="{{ $post->user->get_photo() }}" alt="Photo {{ $post->user->get_complete_name() }}">
              </a>
              <div class="ml-3 media-body">
                <div class="mt-0 pub-user-name">
                  <a href="{{ route('profil') }}?id={{ $post->user_id }}">
                    {{ $post->user->get_complete_name() }}
                  </a> &nbsp;
                  <span title="Publication non validée" class="text-{{ $post->validate ? "success" : "danger"}}"><i class="fa fa-check-circle"></i></span>
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
          <div class="footer border-top p-2 pl-4 pr-4">
            <div class="d-flex justify-content-between align-items-center">
              <div>
              <h6>Récent</h6>
              <div class="small text-muted">
                @if($post->validate)
                  <div>Certifier le: {{ $post->validate_at }}</div>
                  <div>Par: {{ $post->get_certificate_author() }} </div>
                @else
                  @if($post->validate_at)
                  <div>Certification annulé le: {{ $post->validate_at }}</div>
                  <div>Par: {{ $post->get_certificate_author() }}</div>
                  @else
                    <div class="">Aucune opération</div>
                  @endif
                @endif
              </div>
              </div>
              <div class="text-right">
                @if(!$post->validate)
                  <a class="btn btn-sm btn-primary" href="{{ route('admin.validate_pub', $post->id) }}?action=validate">Certifier</a>
                @else
                  <a class="btn btn-sm btn-danger" href="{{ route('admin.validate_pub', $post->id) }}?action=cancel">Annuler la certification</a>
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>

</div>
