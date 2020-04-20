@extends('page')

@section('extras_style')
  @include('news.style')
@endsection

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
        <a class="btn btn-primary btn-md" href="<?= route('register') ?>" role="button">S'inscrire</a>
        <a class="btn btn-primary btn-md" href="<?= route('explorer') ?>" role="button">Annuaire des caïmans</a>
      </div>
    </div>
  </div>
  <div class="container">
    @include("news.last")
  </div>
</div>
@endsection
