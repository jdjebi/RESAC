@extends('app.page')

@section('extras_style')
<link rel="stylesheet" href="{{ cdn_asset("asset/css/placeholder-loading.min.css") }}">
<link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
<style media="screen">
  body{
    background-color: #f1f3f6
  }
</style>
@endsection

@section('content')

<div class="container-fluid mt-3">

  <div class="row">

    <div class="col-md-2 offset-lg-1 d-none d-lg-block offset-sm-2">

      @include('app.feed.left')

    </div>

    <div class="resac-padding-left-right-on-sm col-sm-12 col-md-8 col-lg-5">

      @include('flash')

      <div class="post-box" id="post-box-v1">
        <form action="{{ route('app.post.publish') }}" method="post">
          @csrf
          <div class="box bg-white resac-linkedin-shadow">
              <div class="header pl-4 pt-3 pb-3">
                <div class="header-post-message">
                  <i class="fa fa-edit"></i> Publication
                </div>
              </div>
              <div class="body pl-4 pr-4 pb-3">
                <textarea id="textarea-post-box" class="form-control" id="post-area" rows="3" name="content" placeholder="Exprimez vous..."></textarea>
              </div>
              <div class="footer p-2 pr-4 border-top text-right">
                <button class="btn btn-sm btn-primary" type="submit" name="new_post">Publier</button>
              </div>
          </div>
        </form>
      </div>

      <div class="separator mt-3"></div>

      <div id="feed" class="resac-feed">

        @foreach ($feed_posts as $key => $post)

          @include("app.publications.templates.post")

        @endforeach

      </div>

    </div>

    <div id="annonce" class="col-sm-4 d-none d-md-block d-lg-block">
      @include('app.feed.annonce')
    </div>

  </div>

</div>

@endsection

@section('scripts')
<script type="module" src="{{ asset("asset/js/resac/init.timeago.js") }}"></script>
<script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/resac/vue.truncate_filter.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/lib/autosize.min.js") }}" type="text/javascript"></script>
<script>
  autosize($('#textarea-post-box'));
</script>
@endsection
