@include('app.news.style')
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Les nouveautés</h4>
			<ul class="timeline">
        <li>
          <span class="text-primary">Page d'actualités première version</span>
					<div class="text-muted small"><i class="far fa-clock"></i> 20 Avril 2020</div>
					<p class="mt-2">
            Il est désormais possible de publier du contenu textuelle. Il s'agit de la première version de la fil d'actualités destinée à permettre aux membres de RESAC d'interagir au travers de publications textuelle.
            Pour l'instant, la fil se contente d'afficher les publications des plus récentes aux plus anciennes. Par ailleurs des fonctionnalités mineures seront intégrées afin d'améliorer l'exprérience utilisateur.
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
