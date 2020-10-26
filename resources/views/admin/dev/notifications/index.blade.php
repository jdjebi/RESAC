@extends('admin.base')

@section('main-content')
@include('flash')
<div class="mt-3 container-fluid">
    <div class="h3">Notifications</div>
    <div>
        <a href="{{ route("backend.notification.create") }}" class="btn btn-primary">Générer</a>
    </div>
    <hr>
    <div>
        <div class="h3">Reception</div>
    </div>
</div>


@endsection

@section("scripts")

@endsection
