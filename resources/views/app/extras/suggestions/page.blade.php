@extends('app.page')

@section('extras_style')
    @parent
    <link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/suggestions.css") }}">
@endsection

@section('content')

<div id="v-suggestions" class="container-fluid mt-3">

  <div class="row">

    <div class="col-md-2 offset-lg-1 d-none d-lg-block offset-sm-2">
      @include('app.extras.suggestions.nav')
    </div>

    <div class="resac-padding-left-right-on-sm col-sm-12 col-lg-9">

        @include('flash')

        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="h4 text-center text-mute">@yield('suggestions-header')</div>
          <div>
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-suggestion"><i class="fa fa-plus"></i> Créer</a>
          </div>
        </div>

        @yield('suggestions-content')

    </div>

  </div>

</div>

@endsection

@section('scripts')
<script src="{{ cdn_asset("asset/js/timeago/jquery.timeago.js") }}"></script>
<script src="{{ asset("asset/js/timeago/jquery.timeago.fr-short.js") }}"></script>
<script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>
@endsection