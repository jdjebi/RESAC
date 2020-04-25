@extends('admin.page')

@section('extras_style')
<link rel="stylesheet" href="{{ asset("asset/css/placeholder-loading.min.css") }}">
<style media="screen">
.ph-item>* {
  flex: 1 1 auto;
  display: flex;
  flex-flow: column;
  padding-right: 0px;
  padding-left: 0px;
}

.ph-item {
    direction: ltr;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    padding: 0px;
    overflow: hidden;
    margin-bottom: 30px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 2px;
}
.user-photo {
    width: 30px;
    height: 30px;
    background: #eee;
    border-radius: 50%;
}
</style>
@endsection

@section('content')
<div class="container mt-5">
  @include('flash')
</div>

<div class="container-fluid">

</div>

<div id="v-table" class="container-fluid">
  <div class="h4 mb-4">
    Gestion des utilisateurs
  </div>
  <div class="">
    <table class="table">
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
          <td class="text-center">
            <a v-bind:href="user.admin_profil_url" class="text-info" title="Profil dans l'administration."><i class="fa fa-user-cog"></i></a>
            <a v-bind:href="user.profil_url" class="text-muted" target="_blank" title="Profil sur RESAC."><i class="fa fa-user"></i></a>
            <a v-on:click="delete_user" class="text-danger" href="#delete" title="Supprimer l'utilisateur"><i class="fa fa-trash"></i></a>
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
@endsection

@section('scripts')
<script src="{{ asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>

<script type="text/javascript">

var api_get_user_list = "{{ route("api_get_user_list") }}";

/* table */
var vm = new Vue({
  el: '#v-table',

  data:{
      users: []
  },

  beforeCreate: function(){
    get_user_list();
  },

  methods: {

    delete_user: function(e){

      show_delete_alert();

    }

  }

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
      vm.users = data;
      show_table();
    },
    error: function(data,status,error){
      alert("Une erreur c'est produite. Veuillez consulter les logs");
      console.log(error);
    }
  });
}

function show_delete_alert(){
  Swal.fire({
  title: 'Confirmation',
  text: "Voulez vous vraiment supprimer cet utilisateur ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui',
  cancelButtonText: 'Annuler',
}).then((result) => {
  if (result.value) {

    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

  }
})
}
/* END table */

</script>
@endsection
