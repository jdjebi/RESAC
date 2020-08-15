@extends('app.page')

@section('extras_style')
  @include('app.profil.style')
  <link rel="stylesheet" href="{{ asset("asset/css/resac/pubs.css") }}">
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

@section('scripts')
<script type="module" src="asset/js/resac/init.timeago.js"></script>
@endsection

