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
			<h4>Fil des nouveautés</h4>
			<ul class="timeline">
        <li>
          <span class="text-primary"><b>Mise à jour de l'interface</b></span>
					<div class="text-muted small"><i class="far fa-clock"></i> 16 Avril 2020</div>
					<p class="mt-2">Des icônes de type <i>Font Awsome</i> ont été ajoutée un peu partout sur le site de sorte à rendre la plateforme plus conviviable. En outre, la sécurité des formulaires à été renforcé de sorte à éviter toutes les erreurs qui y sont liées.</p>
        </li>
				<li>
					<span class="text-primary">Introduction à RESAC &middot Annuaire</span>
					<div class="text-muted small"><i class="far fa-clock"></i> 14 Avril 2020</div>
					<p class="mt-2"><span class="text-primary">RESAC &middot Annuaire</span> est la première version utilisable de RESAC, fraîchement déployée. Étant la première version, vous rencontriez sûrement des erreurs ou des manquements. Mais pas de panique ces dernières seront corrigées dans les jours à venir.</p>
				</li>
			</ul>
		</div>
	</div>
</div>
