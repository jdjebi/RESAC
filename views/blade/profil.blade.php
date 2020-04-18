@extends('page')

@section('extras_style')
  @include('profil.style')
@endsection

@section('content')

<div class="container mt-5">
  @include("flash");
</div>

@if ($show_portofolio)
  @include("profil.visitor")
@else
  @include("profil.user")
@endif

@endsection
