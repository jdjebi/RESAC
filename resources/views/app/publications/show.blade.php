@extends('app.publications.post_page')

@section('extras_style')
  @include('app.publications.style')
@endsection

@section('main-content')

<div class="row">
  <div class="col-sm-12 offset-md-2 col-md-7">

      @include("app.publications.templates.post")

  </div>
</div>

@endsection

