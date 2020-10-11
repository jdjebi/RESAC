@extends('admin.base')

@section('extras_style')
  @parent
  <link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
@endsection

@section('main-content')

@include('admin.pubs.breadcumb.my_posts')
@include('flash')

<div>
  <div id="v-table" class="mt-3 container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="h4 mb-4">Mes publications</div>
        <hr>
      </div>
      <div class="col-sm-12 mb-4">
        <div class="d-flex">
          <div class="resac-linkedin-shadow bg-white p-2 pl-3 resac-w-200">
            <div class="h6 text-muted font-weight-bold"><span class="" v-html="pubs_counter">0</span> Publications</div>
          </div>
        </div>
      </div>
      <div id="posts-lists" class="d-none col-sm-12">
        <div v-for="(pub,index) in pubs" v-bind:id="pub.id">
          <div class="bg-post">
            <div class="pub-box">
              <div class="box bg-white mb-3 resac-linkedin-shadow">
                <div class="header pl-4 pt-3 pb-3 pr-4">
                  <div class="media">
                    <a v-bind:title="user.fullname" v-bind:href="user.admin_profil_url">
                    <img class="pub-user-photo" v-bind:src="user.photo" v-bind:alt="user.fullname">
                    </a>
                    <div class="ml-3 media-body">
                      <div class="mt-0 pub-user-name">
                        <a v-bind:href="user.admin_profil_url">
                          @{{ user.fullname }}
                        </a> &nbsp;
                      <span v-bind:title="pub.validate_status_title" v-bind:class="'text-'+pub.validate_status_tag"><i class="fa fa-check-circle"></i></span>
                      </div>
                      <span class="text-muted small">
                        <i class="far fa-clock"></i> <time class="timeago" v-bind:datetime="pub.date"  v-bind:title="pub.date">@{{ pub.date }}</time>
                        &middot
                        <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> @{{ pub.scope }}</span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="body pl-4 pr-4 pb-3">@{{ pub.content | truncate(300,".....") }}</div>
                <div class="footer border-top p-2 pl-4 pr-4">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="posts-list-elm-tag-status">
                        <template v-if="pub.status == 0">
                          <span class="text-muted">Brouillon</span>
                        </template>
                        <template v-else-if="pub.status == 1">
                          <div v-if="pub.is_active == 1">
                            <span class="text-success">Publié</span>
                          </div>
                          <div v-else>
                            <span class="text-danger">Bloqué</span>
                          </div>
                        </template> 
                        <template v-else-if="pub.status == 3">
                          <span class="text-dark">Terminé</span>
                        </template> 
                      </div>
                    </div>
                    <div>
                      <a v-bind:href="url.show_post + pub.id" class="btn btn-sm btn-primary resac-fb-btn-default">Afficher</a>
                      <a v-bind:href="url.edit_post + pub.id" class="btn btn-sm btn-info resac-fb-btn-default">Modifier</a>
                      <a href="#" v-on:click="OnDeletePost(pub.id,$event)" class="btn btn-sm btn-danger resac-fb-btn-default">Supprimer</a>
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
  </div>
  <div id="v-table-loader" class="text-center">
    <div class="spinner-border text-secondary" role="status">
      <span class="sr-only">Loading...</span>
    </div>          
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset("asset/js/timeago/jquery.timeago.js") }}"></script>
<script src="{{ asset("asset/js/timeago/jquery.timeago.fr-short.js") }}"></script>
<script type="text/javascript">

var vm = new Vue({
    el: '#v-table',

    data:{
        user: null,
        url: {
            manage: "{{ route('admin.post.my_posts') }}",
            get_posts: "{{ route('backend.api.post.user',UserAuth()->id) }}",
            show_post: "{{ route("admin.manage_pub","") }}/",
            edit_post: "{{ route("admin.manage_pub","") }}/",
            delete_post: "{{ route('backend.post.delete.my_post',"") }}/"
        },
        manage_pub_base_url: "{{ route("admin.manage_pub","") }}/",
        pubs: []
    },

    computed: {
        pubs_counter: function () {
          return this.pubs.length
        }
    },

    mounted: function (){
        var users = [];
        $.get({
            url: this.url.get_posts,
            dataType: 'json',
            success: function(data,status){
              $("#posts-lists").removeClass('d-none');
              $("#v-table-loader").hide();
              vm.user = data.data.user
              vm.pubs = data.data.posts;
            },
            error: function(data,status,error){
              Swal.fire("Oops !","Une erreur c'est produite. Veuillez contacter un administrateur du site.","error");
            }
        });
    },

    methods:{
      OnDeletePost: function(id,event){
        Swal.fire({
          title:'Confirmation',
          icon: 'warning',
          text:'Voulez vous vraiment supprimer cette publications',
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Oui",
          cancelButtonText: "Annuler",
        }).then( (result) => {
          if(result.value){
            window.location = this.url.delete_post + id;
          }
        });
      }
    }

});

setInterval(function (){
  $("time.timeago").timeago();
},200);
</script>
@endsection
