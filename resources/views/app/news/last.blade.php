@include('app.news.style')
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Les nouveautés</h4>
			<ul class="timeline">
				<li>
					<span class="text-primary"><b>Certification des publications</b></span>
					<div class="text-muted small"><i class="far fa-clock"></i> 5 Mai 2020</div>
					<p class="mt-2">
						Désormais, lorsqu'un contenu est publié, il est marqué du badge <i class=" text-danger fa fa-check-circle"></i> indiquant qu'il n'a pas été approuvé. En effet, pour garantir la pertinence du contenu publié, toutes les publications devront être approuvée par les administrateurs de RESAC. Ainsi, tout contenu approuvé sera marqué du badge <i class=" text-success fa fa-check-circle"></i>. L'objectif étant de faire la distinction entre les contenus jugé pertinent et non mais aussi de limiter la publication de contenu inaproprié.
					</p>
				</li>
			</ul>
		</div>
    <div class="col-md-6 offset-md-3">
      <div class="text-center">
        <a href="{{ route('dev_news') }}"><i class="fa fa-arrow-alt-circle-up"></i> Voir Plus</a>
      </div>
    </div>
	</div>
</div>
