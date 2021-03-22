@extends('admin.base')

@section("extras_style")
@parent
<link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
@endsection

@section('main-content')

@include('flash')
<div class="mt-3 container-fluid">
    <div class="h3">Suggestions</div>
    <hr>
    <div>
        @foreach($suggestions as $suggestion)

            <div class="bg-post">
                <div class="pub-box">
                <div class="box bg-white mb-3 resac-linkedin-shadow">
                    <div class="header pl-4 pt-3 pb-3 pr-4">
                    <div class="media">
                        <a title="{{ $suggestion->user->fullname }}" href="{{ route('admin.membre.show', $suggestion->user->id) }}">
                        <img class="pub-user-photo" src="{{ photos_cdn_asset($suggestion->user) }}" alt="{{ $suggestion->user->fullname }}">
                        </a>
                        <div class="ml-3 media-body">
                        <div class="mt-0 pub-user-name">
                            <a href="{{ route('admin.membre.show', $suggestion->user->id) }}">
                                {{ $suggestion->user->fullname }}
                            </a> &nbsp;
                        </div>
                        <span class="text-muted small">
                            @for($i = 0; $i < $suggestion->note; $i++)
                                <i class="fa resac-color-star fa-star"></i>   
                            @endfor
                            @for($i = $suggestion->note; $i < 5; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                            &middot;
                            <i class="far fa-clock"></i> <time class="timeago" datetime="{{ $suggestion->created_at }}"  title="{{ $suggestion->created_at }}">{{ $suggestion->created_at }}</time>
                        </span>
                        </div>
                    </div>
                    </div>
                    <div class="body pl-4 pr-4 pb-3">{{ $suggestion->content }}</div>
                </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

@endsection

@section("scripts")
@parent
<script src="{{ asset("asset/js/timeago/jquery.timeago.js") }}"></script>
<script src="{{ asset("asset/js/timeago/jquery.timeago.fr-short.js") }}"></script>
<script>
    $("time.timeago").timeago();
</script>
@endsection
