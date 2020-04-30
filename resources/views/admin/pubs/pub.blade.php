@extends('admin.page')

@section('extras_style')
  @include('admin.pubs.dashboard_style')
  <link rel="stylesheet" href="{{ asset("asset/css/resac/pubs.css") }}">
  <style media="screen">
  body{
    background-color: #f1f3f6
  }
  </style>
@endsection


@section('content')
  @include('admin.pubs.dashboard_nav')
  @include('flash')
  <div class="mt-3 container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <div class="h4 mb-4">Publication #{{ $post->id }}</div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 pt-5">
        @include("admin.pubs.pub_content")
      </div>
    </div>
  </div>
@endsection

@section('srcipts')
<script type="module" src="asset/js/resac/init.timeago.js"></script>
@endsection
