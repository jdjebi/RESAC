@extends('app.page')

@section('extras_style')
<link rel="stylesheet" href="asset/css/placeholder-loading.min.css">

<link rel="stylesheet" href="{{ asset("asset/css/resac/pubs.css") }}">
<style media="screen">
  body{
    background-color: #f1f3f6
  }
  .search-user-photo{
    width: 100px;
    height: 100px;
  }
</style>
@endsection

@section('content')

<div class="container mt-3">

  <div class="row">

    <div class="col-sm-12 col-md-12 bg-white border">

      @if(!empty($search_query))
        <div class=" mt-4 h5 mb-5 text-dark">
          Recherche pour "{{ $search_query }}" - Résultats {{ count($results) }}
        </div>

        @foreach ($results as $u)
          <div class="mt-4 media">
            <img src="{{ $u->photo }}" class="search-user-photo mr-3" alt="...">
            <div class="media-body">
              <h5 class="mt-0"><a href="{{ route('profil') }}?id={{ $u->id }}">{{ $u->fullname }}</a></h5>
              <div class="text-muted small">{{ $u->promo }}</div>
              <div class="text-muted">{{ $u->pays }} | {{ $u->emploi }} &middot {{ $u->universite }}</div>
            </div>
          </div>
          <hr>
        @endforeach

        @if(count($results) == 0)
          <div class="h6 mt-4 text-dark">
            Aucun utilisateur trouvé
          </div>
        @endif

      @else

      <div class="text-center mt-5">
        <div class="h3">
          <i class="fa fa-search"></i>
        </div>
        <div class="h3">
          Rechercher un utilisateur
        </div>
      </div>

      @endif

    </div>


  </div>


</div>


@endsection

@section('scripts')
<script type="module" src="asset/js/resac/init.timeago.js"></script>
<script src="{{ asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ asset("asset/js/resac/vue.truncate_filter.js") }}" type="text/javascript"></script>
@endsection
