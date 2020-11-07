@extends('admin.base')

@section('main-content')
<div class="nav-scroller shadow-sm">
  <nav id="resac-breadcrumb" aria-label="breadcrumb" >
      <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="#">Utilisateurs</a></li>
      </ol>
  </nav>
</div>
@include('flash')

<div id="v-table" class="mt-3 container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="h4 mb-4">Gestion des utilisateurs</div>
      <hr>
    </div>
    <div class="col-sm-12 mb-4">
      <div class="d-flex">
        <div class="resac-linkedin-shadow bg-white p-2 pl-3 resac-w-200">
          <div class="h4" v-html="member_counter">0</div>
          <div class="h6 text-muted font-weight-bold">Membres</div>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="resac-linkedin-shadow bg-white" style="padding: 10px;">
        <table class="table table-hover table-responsive-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Photo</th>
              <th scope="col">Nom & Prénom</th>
              <th scope="col">Promotion</th>
              <th scope="col">Ecole/universite</th>
              <th scope="col">Emploi</th>
              <th scope="col">Pays</th>
              <th scope="col">Rôle</th>
              <th scope="col">Version</th>
              <th scope="col" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody id="v-table-row" class="d-none">
            <tr v-for="(user,index) in users" v-bind:id="user.id">
              <td>@{{ index + 1 }}</td>
              <th scope="row">
                <a v-bind:href="user.admin_profil_url">
                  <img class="user-photo" v-bind:src="user.photo">
                </a>
              </th>
              <td><a v-bind:href="user.admin_profil_url">@{{ user.nom }} @{{ user.prenom }}</a></td>
              <td>@{{ user.promo }}</td>
              <td>@{{ user.universite }}</td>
              <td>@{{ user.emploi }}</td>
              <td>@{{ user.pays }}</td>
              <td>@{{ user.role }}</td>
              <td class="text-center">@{{ user.version }}</td>
              <td class="text-center">
                <a v-bind:href="user.admin_profil_url" class="text-info" title="Profil dans l'administration."><i class="fa fa-user-cog"></i></a>
                <a v-bind:href="user.profil_url" class="text-muted" target="_blank" title="Profil sur RESAC."><i class="fa fa-user"></i></a>
              </td>
            </tr>
          </tbody>
        </table>

        <div id="v-table-loader" class="ph-item">
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
@endsection

@section('scripts')
<script src="{{ asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>

<script type="text/javascript">

var api_get_user_list = "{{ route("backend.api.user.all.manage_data") }}";

/* table */
var vm = new Vue({
  el: '#v-table',
  data:{
      users: [],
  },
  beforeCreate: function(){
    get_user_list();
  },
  computed: {
    member_counter: function () {
      return this.users.length
    }
  },
});


function show_table(){
  $("#v-table-row").removeClass('d-none');
  $("#v-table-loader").hide();
}

function get_user_list(){
  var users = [];
  $.get({
    url: api_get_user_list,
    dataType: 'json',
    success: function(data,status){
      vm.users = data.data;
      show_table();
    },
    error: function(data,status,error){
      alert("Une erreur c'est produite. Veuillez consulter les logs");
      console.log(error);
    }
  });
}

function delete_user_dialog(id){
  Swal.fire({
    title:'Confirmation',
    icon: 'warning',
    text:'Voulez vous vraiment supprimer cet utilisateur',
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler"
  }).then( (result) => {
    if(result.value){
      window.location = "{{ route('admin_delete_user',[],false) }}"+"?delete="+id;
    }
  });
}


</script>
@endsection
