@extends('app.page')

@section('extras_style')
  @include('app.profil.style')
@endsection

@section('content')

<div class="container mt-1">
  @include("flash")
</div>

@if ($show_portofolio)
  @include("app.profil.visitor")
@else
  @include("app.profil.user")
@endif

@endsection
