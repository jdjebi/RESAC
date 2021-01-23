  <div class="pub-box">
    <div class="box border bg-white mb-3">
      <div class="header pl-4 pt-3 pb-3 pr-4">
        <div class="media">
          <a title="{{ $suggestion->user_object->fullname }}" href="{{ route('profil') }}?id={{ $suggestion->user->id }}">
            <img class="pub-user-photo" src="{{ photos_cdn_asset($suggestion->user_object) }}" alt="Photo {{ $suggestion->user_object->fullname }}">
          </a>
          <div class="ml-3 media-body">
            <div class="dropdown float-right">
              <a class="dropdown-toggle" href="#" role="button" id="pub-box-menu-option-{{ $suggestion->id }}" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                <i class="text-muted fa fa-ellipsis-h"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="pub-box-menu-option-{{ $suggestion->id }}">
                <h6 class="dropdown-header">Options</h6>
                @if($suggestion->user_id != $user->id && false)
                <a class="dropdown-item" href="#"><i class="far fa-check-circle"></i> &nbsp; Marquer comme lu</a>
                @endif
  
                @if($suggestion->user_id == $user->id)
                <a class="dropdown-item" href="?origin=feed&delete={{ $suggestion->id }}"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                @endif
              </div>
            </div>
            <div class="mt-0 pub-user-name">
              <a href="{{ route('profil') }}?id={{ $suggestion->user_id }}">
                {{ $suggestion->user_object->fullname }}
              </a> &nbsp;
              <span title="Suggestion {{ $suggestion->note != 0 ? "notée" : "non notée"}}" class="text-{{ $suggestion->note != 0 ? "success" : "danger"}}"><i class="fa fa-check-circle"></i></span>
            </div>
            <span class="text-muted small">
              <span class="post-badge post-badge-info mr-1">INFORMATION</span>&nbsp;
              <time class="timeago" datetime="{{ $suggestion->date }}" title="{{ $suggestion->date }}"> <i class="far fa-clock"></i></time>
              &middot
              <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> </span>
            </span>
          </div>
        </div>
      </div>
      <div class="body pl-4 pr-4 pb-3">{!! $suggestion->content !!}</div>
      @if ($request->is('suggestions/notées'))
      <div class="body pl-4 pr-4 pb-3">
        <i> Note Actuelle: {!! $suggestion->note !!}</i>
      </div> 
      @endif
      @if ($request->is('suggestions/liste'))
        
        @if ($suggestion->noteurs == " ")
            <div class="body pl-4 pr-4 pb-3">
              <i> Note Actuelle: {!! $suggestion->note !!}</i>
            </div>
            <div class="header pl-4 pr-4 pb-3">
              <form class="row g-5" method="POST" action="/suggestions/liste/{{ $suggestion->id }}">
                  @csrf
                    <div class="col-auto">
                      <input type="text" name="note" id="note" placeholder="Notez cette suggestion " class="form-control">
                    </div>
                    <div class="col-auto">
                      <button id="submit-btn" name="button" class="btn btn-primary btn-md">Noter</button>
                    </div>
                  
                </form>        
            </div>     
          @else
            @for ($i = 0; $i < count($id[$suggestion->id]); $i++)
              @if (isset($id[$suggestion->id][$i]) && $id[$suggestion->id][$i] == $user->id)
                <div class="body pl-4 pr-4 pb-3">
                  <i> Note Actuelle: {!! $suggestion->note !!} <br> Vous avez déjà noté cette suggestion </i>
                </div>
                <i style="color: white"> {{$i = count( $id[$suggestion->id] ) }}</i>
              @elseif(isset($id[$suggestion->id][$i]) && $id[$suggestion->id][$i] != $user->id)
                <div class="body pl-4 pr-4 pb-3">
                  <i> Note Actuelle: {!! $suggestion->note !!}</i>
                </div>
                <div class="header pl-4 pr-4 pb-3">
                  <form class="row g-5" method="POST" action="/suggestions/liste/{{ $suggestion->id }}">
                      @csrf
                        <div class="col-auto">
                          <input type="text" name="note" id="note" placeholder="Notez cette suggestion " class="form-control">
                        </div>
                        <div class="col-auto">
                          <button id="submit-btn" name="button" class="btn btn-primary btn-md">Noter</button>
                        </div>
                      
                    </form>        
                </div>
                <i style="color: white"> {{$i = count( $id[$suggestion->id] ) }}</i>
              @else
                @continue
              @endif
  
            @endfor
          @endif     
      @endif 
    </div>
  </div>