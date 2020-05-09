@extends('app.page')

@section('content')
<div class="container mt-5">
  @include('flash')
</div>
<div class="container mt-5">
  <div class="text-center">
    <h1>Bienvenue sur RESAC</h1>
    <div class="text-center">
      <p>La plate-forme du Réseau des Anciens Caïmans</p>
      <div class="pt-3">
        <a class="btn btn-primary btn-md" href="{{ route('register') }}" role="button">S'inscrire</a>
        <a class="btn btn-primary btn-md" href="{{ route('annuaire') }}" role="button">Annuaire des caïmans</a>
      </div>
    </div>
  </div>
  <div class="container">
    @include("app.news.last")
  </div>
  <hr>
  <div class="d-flex justify-content-between mb-3">
    <div class="small">
      <a href="https://github.com/jdjebi/RESAC"><i class="fab fa-github"></i> RESAC</a>
    </div>
    <div class="small">
      &copy; RESAC &middot 2020
    </div>
  </div>
</div>
@endsection
