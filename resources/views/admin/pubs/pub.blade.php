@extends('admin.base')

@section('extras_style')
  @parent
  <link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
@endsection

@section('main-content')
  @include('admin.pubs.dashboard_nav')
  <div class="mt-3 container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <div class="h4 mb-4">Publication #{{ $post->id }} | version {{ $post->version }}</div>
        <hr>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        @include("admin.pubs.pub_content")
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@parent
<script type="module" src="{{ asset("asset/js/resac/init.timeago.js") }}"></script>
@endsection
