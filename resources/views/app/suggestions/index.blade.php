@extends('app.page')

@section('extras_style')
  @include('app.publications.style')
@endsection

@section('content')

<div class="container-fluid mt-3">

  <div class="row">
    <div class="col-lg-2 col-sm-12">

      @include('app.suggestions.nav')

    </div>

    <div class="col-lg-10 col-sm-12">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-12">
            @include('flash')
          </div>
          <div class="col-sm-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active breadcrumb-item-resac-support"><a href="#">Suggestions </a></li>
              </ol>
            </nav>
          </div>
          <div class="col-sm-12">
            <div class="d-flex align-items-center justify-content-between">
              <div class="">
                @if($request->is('suggestions/notées'))
                <h3>Mes suggestions notées</h3>
                @elseif ($request->is('suggestions/non-notées'))
                  <h3>Mes suggestions non notées</h3>
                @elseif($request->is('suggestions/liste'))
                  <h3>Toutes les suggestions</h3>
                @else
                  <h3>Mes suggestions</h3>
                @endif
              </div>            
            </div>
            <hr>
            <div class="row">
              <div class="col">
                @foreach ($suggestions as $suggestion)
                  <div class="row">
                    <div class="col-sm-12 col-md-7">
                        @include('app.suggestions.sugg')
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col">
           
          </div>
        </div>

      </div>
    </div>

  </div>

</div>

@endsection


@section('scripts')
<script type="module" src="{{ asset('asset/js/resac/init.timeago.js') }}"></script>
@endsection
