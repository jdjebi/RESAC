@extends('app.page')

@section('extras_style')
  @include('app.explorer.style')
@endsection


@section('content')
<div class="container mt-5">
  @include("flash")
</div>
<div class="container">
  <h2 class="text-center"><i class="fa fa-search"></i> Exploration</h2>
</div>
<div id="loader" class="mt-5 text-center">
  <div class="spinner-border text-primary" role="status">
    <span class="sr-only">Chargement...</span>
  </div>
</div>
<div id="portofolio" class="container">
  <div class="row">
    <div v-for="user in users" class="card-user col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center p-3">
      <a v-bind:href="user.profil_url">
        <div class="card d-none" style="width: 17rem; position: relative">
          <div class="card-body">
            <div style="position: absolute; top: 3px">
              <span class="small p-1 text-primary">@{{ user.promo }}</span>
            </div>
            <div class="d-flex justify-content-center mb-3">
              <div class="u-photo"></div>
            </div>
            <div class="text-center" style="font-size: 13px;">
              <div style="font-weight: 500" class="">
                <span>@{{ user.nom }} @{{ user.prenom }}</span>
              </div>
              <div style="font-weight: 500" class="">
                @{{ user.emploi }} &middot @{{ user.universite }}
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
    user_connected: {{ Auth::check() }},

  },

  mounted: function(){
    $(".card-user .card").each(function(){
      $(this).removeClass("d-none");
      $("#loader").hide();
    })
  }
});
</script>
@endsection