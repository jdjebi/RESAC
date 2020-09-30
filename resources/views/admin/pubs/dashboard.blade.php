@extends('admin.base')

@section('extras_style')
  @parent
  @include('admin.pubs.dashboard_style')
  <style media="screen">
  body{
    background-color: #f1f3f6
  }
  
  </style>
 @endsection

@section('main-content')

<div>

  @include('admin.pubs.dashboard_nav')

  <div id="v-table" class="mt-3 container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="h4 mb-4">Dernières publications</div>
        <hr>
      </div>
      <div class="col-sm-12 mb-4">
        <div class="d-flex">
          <div class="resac-linkedin-shadow bg-white p-2 pl-3 resac-w-200">
            <div class="h4" v-html="pubs_counter">0</div>
            <div class="h6 text-muted font-weight-bold">Publications</div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="">
          <table class="table bg-white table-hover table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Auteur</th>
                <th scope="col">Contenu</th>
                <th scope="col">Date de publication</th>
                <th scope="col">Statut</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="v-table-row" class="d-none">
              <tr v-for="(pub,index) in pubs" v-bind:id="pub.id">
                <td>@{{ index + 1 }}</td>
                <td scope="row">
                  <a v-bind:href="pub.user.admin_profil_url">
                    <img class="user-photo" v-bind:src="pub.user.photo">
                  </a>
                </td>
                <td>
                    <a v-bind:href="pub.user.admin_profil_url">
                      @{{ pub.user.nom }} @{{ pub.user.prenom }}
                    </a>
                </td>
                <td>
                  <p class="truncate-65">
                    @{{ pub.content | truncate(60)}}
                  </p>
                </td>
                <td>@{{ pub.date }}</td>
                <td class="text-center">
                  <i v-if="pub.validate" class="text-success fa fa-check-circle"></i>
                  <i v-if="!pub.validate" class="text-danger fa fa-check-circle"></i>
                </td>
                <td>
                  <a class="btn btn-sm btn-primary" v-bind:href="manage_pub_base_url + pub.id">Consulter</a>
                </td>
              </tr>
            </tbody>
          </table>
          <div id="v-table-loader" class="ph-item bg-light">
            <div class="ph-col-12">
              <div class="ph-row">
                <div class="ph-col-12 big"></div>
                <div class="ph-col-12 big"></div>
                <div class="ph-col-12 big"></div>
                <div class="ph-col-12 big"></div>
                <div class="ph-col-12 big"></div>
                <div class="ph-col-12 big"></div>
                <div class="ph-col-12 big"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ asset("asset/js/resac/vue.truncate_filter.js") }}" type="text/javascript"></script>

<script type="text/javascript">

var api_get_pubs = "{{ route("admin.api.pubs_all") }}";
var manage_pub_base_url = "{{ route("admin.manage_pub","") }}/";


var vm = new Vue({
  el: '#v-table',
  data:{
      manage_pub_base_url: manage_pub_base_url,
      pubs: []
  },
  computed: {
    pubs_counter: function () {
      return this.pubs.length
    }
  },
  beforeCreate: function(){
    get_pubs();
  }
});

function get_pubs(){
  var users = [];
  $.get({
    url: api_get_pubs,
    dataType: 'json',
    success: function(data,status){
      vm.pubs = data;
      show_table();
    },
    error: function(data,status,error){
      Swal.fire("Oops !","Une erreur c'est produite. Veuillez contacter un administrateur du site.","error");
    }
  });
}

function show_table(){
  $("#v-table-row").removeClass('d-none');
  $("#v-table-loader").hide();
}

</script>
@endsection
