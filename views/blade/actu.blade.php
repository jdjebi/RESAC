@extends('page')

@section('extras_style')
<style media="screen">
  body{
    background-color: #f1f3f6
  }

  .post-box .box{
    border-radius: 1em;
    position: relative;
    box-sizing: content-box;
    overflow: hidden;
  }

  .post-box .header-post-message{
    font-weight: 500
  }

  .pub-box .pub-user-photo{
    width: 40px;
    height: 40px;
    border-radius: 50%
  }

  .pub-box .pub-user-name{
    font-size: 14px;
    font-weight: 500
  }
</style>
@endsection

@section('content')

<div class="container mt-3">

  <div class="row">

    <div class="col-md-3">

    </div>

    <div class="col-md-6">

      <div class="post-box" id="post-box-v1">
        <form class="" action="index.html" method="post">
          <div class="box border bg-white">
              <div class="header pl-4 pt-3 pb-3">
                <div class="header-post-message">
                  <i class="fa fa-edit"></i> Publication
                </div>
              </div>
              <div class="body pl-4 pr-4 pb-3">
                <textarea class="form-control" id="post-area" rows="3" placeholder="Exprimez vous..."></textarea>
              </div>
              <div class="footer p-2 pr-4 border-top text-right">
                <button class="btn btn-sm btn-primary" type="button" name="button">Publier</button>
              </div>
          </div>
        </form>
      </div>

      <div class="separator mt-3"></div>

      <div id="feed">

        <div class="pub-box" id="">
            <div class="box border bg-white">
                <div class="header pl-4 pt-3 pb-3">
                  <div class="media">
                    <img class="pub-user-photo" src="asset/imgs/user_default_pic.png" alt="">
                    <div class="ml-3 media-body">
                      <div class="mt-0 pub-user-name">Dje Bi Jean-Marc</div>
                      <span class="text-muted small">14 Janvier 2017 &middot Public</span>
                    </div>
                  </div>
                </div>
                <div class="body pl-4 pr-4 pb-3">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
                <div class="footer p-2 pr-4 border-top text-right">
                  <button disabled class="btn btn-sm btn-primary" type="button" name="button" title="Les publications marquées lu n'apparaitrons plus dans la fil.">Maquer comme lu</button>
                </div>
            </div>
        </div>

      </div>

    </div>

    <div class="col-md-3">

    </div>

  </div>


</div>


@endsection
