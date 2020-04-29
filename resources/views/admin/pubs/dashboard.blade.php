@extends('admin.page')

@section('extras_style')
  @include('admin.base_style')
@endsection

@section('content')
@include('flash')

<div id="v-table" class="mt-3 container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="h4 mb-4">Dernières publications</div>
    </div>
    <div class="col-sm-12">
      <div class="">
        <table class="table table-hover table-responsive-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Photo</th>
              <th scope="col">Auteur</th>
              <th scope="col">Contenu</th>
              <th scope="col">Date de publication</th>
              <th scope="col">Etat</th>
            </tr>
          </thead>
          <tbody id="v-table-row" class="d-none">
            <tr v-for="(pub,index) in pubs" v-bind:id="pub.id">
              <td>@{{ index + 1 }}</td>
              <td scope="row">
                <a>
                  <img class="user-photo">
                </a>
              </td>
              <td><a></a></td>
              <td></td>
              <td></td>
              <td></td>
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
<script type="text/javascript">

var api_get_pubs = "{{ route("admin.api.pubs_all") }}";

var vm = new Vue({
  el: '#v-table',

  data:{
      pubs: []
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
      console.log(data);
    },
    error: function(data,status,error){
      Swal.fire("Oops !","Une erreur c'est produite. Veuillez contacter un administrateur du site.","error");
      console.log(error);
    }
  });
}

function show_table(){
  $("#v-table-row").removeClass('d-none');
  $("#v-table-loader").hide();
}







/* table */

/*
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
      var id = $(e.target).parent().data('user-id');
      delete_user_dialog(id);
    }
  }

});




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
*/


</script>
@endsection
