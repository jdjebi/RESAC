@extends('app.page')

@section('extras_style')
@include('app.publications.style')
@endsection

@section('content')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-lg-2 col-sm-12">
      @include('app.publications.nav')
    </div>

    <div class="col-lg-10 col-sm-12">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('app.post') }}">Publication</a></li>
                <li class="breadcrumb-item"><a href="{{ route('app.post.hub') }}">Créer</a></li>
                <li class="breadcrumb-item active breadcrumb-item-resac-support">Publication libre</li>
              </ol>
            </nav>
          </div>
          <div class="col-sm-12">
            @include('flash')
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">

            <div class="">
              <h5>Publication libre</h5>
            </div>

            <hr>

            <div class="alert alert-info text-center">
              Cette publication devra être approuvée par les administrateurs de RESAC avant d'être visible
            </div>

            <div class="post-box" id="post-box-v1">
              <form action="" method="post">
                @csrf
                <div class="box border bg-white">
                    <div class="header pl-4 pt-3 pb-3">
                      <div class="header-post-message">
                        <i class="fa fa-edit"></i> Publication
                      </div>
                    </div>
                    <div class="body pl-4 pr-4 pb-3">
                      <textarea class="form-control" id="post-area" rows="5" name="content" placeholder="Exprimez vous..."></textarea>
                    </div>
                    <div class="footer p-2 pr-4 border-top text-right">
                      <button class="btn btn-sm btn-primary" type="submit" name="register-post">Publier</button>
                    </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection
