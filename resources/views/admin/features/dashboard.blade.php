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
@include('flash')

<div>

  <div id="v-table" class="mt-3 container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="d-flex justify-content-between">
          <div class="h3 mb-4">Nouveautés</div>
          <div class="text-right">
            <a href="{{ route("admin.feature.create") }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Créer </a>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="">
          <table class="table bg-white table-hover table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody id="v-table-row">

              @foreach ($features as $index => $feature)
                <tr v-for="(pub,index) in pubs" v-bind:id="pub.id">
                  <td>{{ $index + 1 }}</td>
                  <td>
                      <a href="{{ route("admin.feature.show",$feature->id) }}">{{ $feature->title }}</a></td>
                  <td>
                    {{ $feature->author->fullname }}
                  </td>
                  <td>{{ $feature->get_sm_created_at() }}</td>
                  <td class="text-center">
                    <a class="text-danger" href="{{ route('admin.feature.delete',$feature->id) }}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>

              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
