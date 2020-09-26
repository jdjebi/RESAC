@extends('admin.base')

@section('extras_style')
    @parent
    @include('app.publications.style')
@endsection

@section('main-content')
<div>
    @include('admin.pubs.dashboard_nav')
</div>
<div class="container-fluid mt-3">
  <div class="row">

    <div class="col-lg-10 col-sm-12">
      <div class="container-fluid">


        <div class="row">
          <div class="col-sm-12">

            <div class="">
              <h5>Publication libre</h5>
            </div>

            <hr>

            <div>
              @include('app.publications.creator.box.free_post_box_quill')
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection
