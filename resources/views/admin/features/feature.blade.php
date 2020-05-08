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
          <span class="h5">Nouveauté</span>
        </div>
        <div class="p-3 bg-white">
          <form method="post">
            @csrf
            <input type="hidden" name="user_author_id" value="{{ $user->id }}">
            <input type="hidden" name="feature_id" value="{{ $feature->id }}">
            <div class="form-group">
              <label for="title">Titre:</label>
              <input class="form-control" type="text" name="title" value="{{ $feature->title }}" placeholder="Titre de la nouveau" id="title">
            </div>
            <div class="form-group">
              <label for="content">Contenu:</label>
              <textarea class="form-control" id="content" rows="5" name="content" placeholder="Description des nouvelles fonctionnalités">{{ $feature->content }}</textarea>
            </div>
            <div class="form-group">
              <label for="created_at">Date:</label>
              <input class="form-control" type="date" name="created_at" value="{{ $feature->get_form_created_at() }}" id="created_at">
            </div>
            <div class="d-flex justify-content-between">
              <div class="text-muted">
                 Créer par {{ $feature->author->fullname }}
              </div>
              <div class="text-right">
                <button class="btn btn-success" type="submit" name="button"><i class="fa fa-edit"></i> Mettre à jour</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
