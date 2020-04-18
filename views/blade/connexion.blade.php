@extends('page')

@section('content')
<div class="container mt-5">
  @include('flash')
</div>
<div class="container mt-5">
  <div class="row">
    <div class="offset-md-2 col-md-8 offset-lg-3 col-lg-5">
      <form action="{{ $redirect_url }}" method="post">
        <h3 class="mt-3 mb-4 text-center">Connexion</h3>
        @if($form->errors)
        <div class="alert alert-danger">
          @if(isset($form->errors["required"]))
            Veuiller remplir tous les champs.
          @elseif(isset($form->errors["login_failed"]))
            Adresse E-mail ou mot de passe incorrecte.
          @endif
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input class="form-control" type="text" value="{{ $form->get("email") }}" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe:</label>
          <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="mt-4">
          <button class="btn btn-primary" type="submit" name="button">Envoyer</button>
          Pas de compte ? <a href="{{ route("register") }}">Créer un compte</a>.
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
