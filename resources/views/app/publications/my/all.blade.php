@foreach ($posts as $post)

  <div class="row">
    <div class="col-sm-12 col-md-7">
        @include('app.publications.my.post')
    </div>
  </div>

@endforeach
