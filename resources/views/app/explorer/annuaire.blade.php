@extends('app.page')

@section('extras_style')
  @include('app.explorer.style')
  <style media="screen">
    body{
      background-color: #f1f3f6
    }

    .resac-user-card{
      
    }

    @media(max-width: 768px) {
      body{
        background-color: #fff;
      }
      .u-photo{
        width: 170px;
        height: 170px;
      }

      .resac-user-card{
        
      }
    }
  </style>
@endsection


@section('content')
<div class="container mt-5">
  @include("flash")
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="p-3">Annuaire des caïmans</h2>
      <hr>
    </div>
  </div>
</div>

<div id="loader" class="mt-5 text-center">
  <div class="spinner-border text-primary" role="status">
    <span class="sr-only">Chargement...</span>
  </div>
</div>

<div id="portofolio" class="container">
  <div class="row">
    <div 
      v-for="user in users" 
      class="card-user col-sm-12 col-md-6 p-0 mb-3"
    >

        <a v-bind:href="user.profil_url">

        <div class="resac-user-card d-none">

          <div class="d-flex justify-content-center">
            <div class="text-center">
              <div>
                <img class="u-photo shadow-sm rounded-circle" v-bind:src="user.photo" alt="">
              </div>
              <div>
                <div style="font-weight: 500" class="">
                  <span>@{{ user.nom }} @{{ user.prenom }}</span>
                </div>
                <div style="font-weight: 500" class="">
                  @{{ user.emploi }} &middot @{{ user.universite }}
                </div>
              </div>
            </div>
          </div>
        </div>

        </a>

    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="asset/js/vue.js" type="text/javascript"></script>
<script type="text/javascript">
var vm = new Vue({
  el: '#portofolio',
  data:{
    users:  <?= $users_json ?>,
    user_connected: {{ \Resac\Auth2::check() ? 'true' : 'false' }},

  },

  mounted: function(){
    $(".card-user .resac-user-card").each(function(){
      $(this).removeClass("d-none");
      $("#loader").hide();
    })
  }
});
</script>
@endsection
