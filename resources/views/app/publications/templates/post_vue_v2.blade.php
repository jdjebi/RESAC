<div v-for=" (post,index) in posts" class="pub-box" id="">
    <div class="box resac-linkedin-shadow bg-white mb-3 pb-1 resac-clear-rounded-on-sm resac-clear-border-left-on-sm resac-clear-border-right-on-sm">
        <div class="header pl-4 pt-3 pb-3 pr-4">
          <div class="media">
            <a v-bind:title:="post.user.fullname" v-bind:href="post.user.profil_url">
              <img class="border pub-user-photo" v-bind:src="post.user.photo" v-bind:alt="'Photo' + post.user.fullname">
            </a>
            <div class="ml-3 media-body">
              <div class="dropdown float-right">
                <a class="dropdown-toggle" href="#" role="button" v-bind:id="'pub-box-menu-option-'+post.id" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                  <i class="text-muted fa fa-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" v-bind:aria-labelledby="'pub-box-menu-option-'+post.id">
                    <h6 class="dropdown-header">
                      Options 
                      @if(Resac\Auth2::is_admin_logged())
                      <b>(Admin)</b>
                      @endif
                    </h6>
                    <a v-if='post.user.id == {{ UserAuth()->id }}'
                      class="dropdown-item small" v-bind:href="'{{ route("app.post.show","") }}/' + post.id"><i class="fa fa-eye"></i> &nbsp; Afficher la publication</a>
                    @if(Resac\Auth2::is_admin_logged())
                        <a class="dropdown-item small" v-bind:href="'{{ route("app.post.delete","") }}/' + post.id + '?origin=feed'"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                    @else 
                    <a v-if='post.user.id == {{ UserAuth()->id }}'
                    class="dropdown-item small" v-bind:href="'{{ route("app.post.delete","") }}/' + post.id + '?origin=feed'"><i class="fa fa-trash"></i> &nbsp; Supprimer la publication</a>
                    @endif
                </div>
              </div>

              <div class="mt-0 pub-user-name">
                <a v-bind:href="post.user.profil_url">
                    @{{ post.user.fullname }}
                </a> &nbsp;
              
            </div>

              <span class="text-muted small">
                <time class="timeago"  v-bind:datetime="post.date" v-bind:title="post.date"> <i class="far fa-clock"></i></time>
                &middot
                <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> @{{ post.scope }}</span>
              </span>

            </div>
          </div>
        </div>
        <div class="body pl-4 pr-4 pb-3" v-html="post.content"></div>
        <div class=" pl-4 pr-4">

          <div class="resac-post-option d-flex justify-content-between align-items-center">
            <div class="small">
             <a v-on:click="ToggleComment(index)" href="#"><span class="text-muted">@{{ post.comments.length }} commentaires</span></a>
            </div>
            <button class="btn btn-sm btn-dark resac-fb-btn-light" v-on:click="ToggleComment(index)">
              <i class="fa fa-comment-alt"></i>&nbsp; Commenter
            </button>
          </div>
          
          <div v-show="post.comment.show">
            <hr class="resac-post-hr-bottom">
            <div class="resac-post-comment ">
              <div class="media align-items-center">
                <img class="border rounded-circle w-20 user-pic" src="{{ photos_cdn_asset(UserAuth()) }}" >
                <div class="ml-3 media-body">
                  <form action="{{ route('backend.comments.store') }}" method="POST">
                    <input type="text" class="comment-input form-control" name="content" placeholder="Commentez puis appuyez entrée...">
                    <input type="hidden" v-bind:value="post.id" name="post_id">
                  </form>
                </div>
              </div>
              <div class="text-right">
                <small class="text-muted">
                  Enregistement en cours...
                </small>
              </div>
            </div>        
            <div class="mb-3">
              <div v-for="comment in post.comments">
                  <div class="resac-post-comment ">
                    <div class="media">
                      <a v-bind:title:="comment.user.fullname" v-bind:href="comment.user.profil_url">
                        <img class="border rounded-circle w-20 user-pic" v-bind:src="comment.user.photo" v-bind:alt="'Photo' + post.user.fullname">
                      </a>
                      <div class="ml-3 media-body">
                        <div>
                          <span class="user-name">@{{ comment.user.fullname }}</span> @{{ comment.content }}
                        </div>
                        <div class="text-left">
                          <span class="text-muted small">
                            <time class="timeago"  v-bind:datetime="comment.created_at" v-bind:title="comment.created_at">@{{ comment.created_at }}</time>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>                
              </div>
            </div>
          </div>

        </div>
    </div>
  </div>