@extends('admin.page')

@section('extras_style')
  @include('admin.pubs.dashboard_style')
  <style media="screen">
  body{
    background-color: #f1f3f6
  }
  </style>
 @endsection

@section('content')

<div class="mt-5 container">
  <div class="row">
    <div class="col-md-12">
      <div class="border">
        <div class="p-3 bg-white border-bottom">
          <span class="h5">Créer une nouveauté</span>
        </div>
        <div class="p-3 bg-white">
          <form method="post">
            <div class="form-group">
              <label for="title">Titre:</label>
              <input class="form-control" type="text" name="title" value="" id="title">
            </div>
            <div class="form-group">
              <label for="content">Contenu:</label>
              <input class="form-control" type="textarea" name="content" value="" id="content">
            </div>
            <div class="form-group">
              <label for="created_at">Date(facultatif):</label>
              <input class="form-control" type="date" name="created_at" value="" id="created_at">
            </div>
            <div class="text-right">
              <button class="btn btn-primary" type="submit" name="button"><i class="fa fa-plus"></i> Créer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
