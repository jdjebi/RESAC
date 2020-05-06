@extends('app.page')

@section('content')
@include('flash')

<div id="v-login" class="container mt-5">
  <div class="row">
    <div class="offset-md-2 col-md-8 offset-lg-3 col-lg-5">
      <form v-on:submit.prevent="onSubmit">
        @csrf
        <h3 class="mt-3 mb-4 text-center">Connexion</h3>

        <div v-if="is_error" id="error-box" class="alert alert-danger d-none">
          @{{ error_message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="form-group">
          <label for="email">E-mail:</label>
          <input class="form-control" type="text" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe:</label>
          <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="mt-4">
          <button id="submit-btn" class="btn btn-block btn-primary" name="button" v-bind:disabled="submit_btn">
          <span v-if="!submit_btn">Envoyer</span>
          <div v-if="submit_btn" class="loader spinner-border text-white spinner-border-sm d-none" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          </button>
          <div class="text-left mt-3">
            Pas de compte ? <a href="{{ route("register") }}">Créer un compte</a>.
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="asset/js/vue.js" type="text/javascript"></script>
<script type="text/javascript">
var url_profil = "{{ route('profil') }}";
var url_redirect = "{{ $redirect_url }}" ;

var vm = new Vue({
  el: "#v-login",
  data:{
    url: "{{ route('api_login') }}",
    submit_btn: false,
    is_error: false,
    error_message: "test"
  },
  beforeCreate: function(){
    $('#submit-btn .loader').removeClass("d-none");
    $('#error-box').removeClass("d-none");
  },
  methods:{
    onSubmit: function(event){
      this.submit_btn = true;
      this.submit(event.target);
    },
    submit: function(form){
      var vm = this;
      var form_data = $(form).serializeArray();
      $.post({
        url: vm.url,
        data: form_data,
        dataType: 'json',
        success: vm.onSuccess,
        error: vm.onError
      });
    },
    onSuccess: function(data,status){
      this.submit_btn = false;

      console.log(data);

      if(data.is_error){
        this.is_error = true;
        this.error_message = data.errors.messages.global;
      }else{
        if(url_redirect != "")
          url = url_redirect;
        else
          url = url_profil;

        window.location = url;
      }
    },
    onError: function (data,status,error){
      alert("Une erreur c'est produite. Contactez l'administrateur.");
      console.log(error);
      this.submit_btn = false;
    },
  }
});
</script>
@endsection
