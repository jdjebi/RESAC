@extends('app.page')


@section('content')

<div class="container-fluid mt-3">

  <div class="row">
    <div class="col-md-2 col-sm-12">

      <ul class="nav flex-column">
        <li class="nav-item nav-pills">
          <a class='nav-link {{ is_current_url('app.post') }}' href="{{ route('app.post') }}">Mes publications</a>
        </li>
        <li class="nav-item">
          <a class='nav-link {{ is_current_url('app.post') }}' href="#">Publications certifiées</a>
        </li>
        <li class="nav-item">
          <a class='nav-link {{ is_current_url('app.post') }}' href="#">Publications non-certifiées</a>
        </li>
      </ul>

    </div>

    <div class="col-md-10 col-sm-12">
      <div class="container">

        <div class="row">
          <div class="col">
            <div class="d-flex align-items-center justify-content-between">
              <div class="">
                <h3>Mes publications</h3>
              </div>
              <div class="">
                <a class="btn btn-success btn-sm" href="#"><i class="fa fa-plus"></i> Créer une Publication</a>
              </div>
            </div>
            <hr>
          </div>
        </div>

      </div>
    </div>

  </div>


</div>

@endsection
