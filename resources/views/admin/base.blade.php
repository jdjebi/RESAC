@extends('admin.page2')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('admin.flash.side_nav')
    <main id="v-main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        @include('flash')
        @yield('main-content')
    </main>
  </div>
</div>
@endsection
