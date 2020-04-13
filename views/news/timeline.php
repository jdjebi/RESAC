<style media="screen">
ul.timeline {
  list-style-type: none;
  position: relative;
}
ul.timeline:before {
  content: ' ';
  background: #d4d9df;
  display: inline-block;
  position: absolute;
  left: 29px;
  width: 2px;
  height: 100%;
  z-index: 400;
}
ul.timeline > li {
  margin: 20px 0;
  padding-left: 20px;
}
ul.timeline > li:before {
  content: ' ';
  background: white;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  border: 3px solid #22c0e8;
  left: 20px;
  width: 20px;
  height: 20px;
  z-index: 400;
}
</style>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Dernières nouveautés</h4>
			<ul class="timeline">
				<li>
					<span class="text-primary">Introduction à RESAC &middot Annuaire</span>
					<a href="#" class="float-right">14 Avril 2020</a>
					<p><span class="text-primary">RESAC &middot Annuaire</span> est la première version utilisable de RESAC, fraîchement déployée. Étant la première version, vous rencontriez sûrement des erreurs ou des manquements. Mais pas de panique ces dernières seront corrigées dans les jours à venir.</p>
				</li>
			</ul>
		</div>
	</div>
</div>
