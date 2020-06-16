@extends('app.page')

@section('extras_style')
  @include('app.publications.style')
@endsection

@section('content')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-lg-2 col-sm-12">
      @include('app.publications.nav')
    </div>

    <div class="col-lg-10 col-sm-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('app.post') }}">Publication</a></li>
          <li class="breadcrumb-item active breadcrumb-item-resac-support">Créer</li>
        </ol>
      </nav>
    </div>

  </div>
</div>
@endsection
