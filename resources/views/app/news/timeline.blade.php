@extends('app.page')

@section('extras_style')
<style media="screen">
body{
	background-color: #f1f3f6
}
.feature{
	background: #fff;
  margin-left: 2em !important;
  padding: 1em 1em 1em 1em;
  border-radius: 5px;
  box-shadow: 2px 2px 2px 1px #e8e8e8;
}
.ill{
	width: 250px;
}
</style>
@endsection

@section('content')

@include('app.news.style')


<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-7">
			<h4>Fil des nouveautés</h4>
			@if(count($features) != 0)
			<ul class="timeline">
				@foreach ($features as $i => $feature)
					<li class="feature">
						<span class="text-primary bold @if($i==0) font-weight-bold @endif">{{ $feature->title }}</span>
						<div class="text-muted small"><i class="far fa-clock"></i> {{ $feature->get_sm_created_at() }}</div>
							{!! $feature->content !!}
						</p>
					</li>
				@endforeach
			</ul>
			@else
				Aucune nouveauté
			@endif
		</div>
		<div class="col-md-5 mt-5">
			<div class="mt-5 text-center">
				<img class="ill" src="{{ asset("asset/imgs/last_features.svg") }}">
			</div>
			<div class="mt-2 text-center">
				<div class="h4 font-weight-light">“Les meilleures choses ont besoin de patience.”</div>
				<div class="blockquote-footer">
					<a href="http://evene.lefigaro.fr/celebre/biographie/jean-anglade-16454.php">Jean Anglade</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
