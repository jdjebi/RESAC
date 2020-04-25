@extends('admin.page')

@section('extras_style')
  @include('admin.user.style')
@endsection

@section('content')

  @include('flash')

  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12 col-md-9 col-lg-7">
        @include('admin.user.profil_view')
      </div>
      <div class="col-sm-12 col-md-12 offset-lg-1 col-lg-4">
        @include('admin.user.profil_manager')
      </div>
    </div>

  </div>

@endsection
