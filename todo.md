# A FAIRE


# Version 6

- Messagerie instannées
- Traducteur de date
- Gestion des écoles, académies et entreprises
- Gestion des pays
- Pour publier il faut posséder le pays et la commune/quartier
- Importation et visualisation de CV 

# FAIT

## EXTRAS
- Documenter la nouvelle tables des publications
- Documenter la base de données
- Description du processus de validation la nouvelle tables des publications
- [] Réfuser la certification
- [] Confirmation des actions sur la page d'une publication
- Gestion des demandes de publication
- Gérer le cas au le où le mail ne part pas


# Sécurité
- Revoir la sécurité du controller de certification

# Bugs
- S'assurer que les permissions système ne pourront pas être supprimée même pas le superadmin
- Supprimer le on delete cascade sur user.validate_by car si un utilisateur ayant validé une publication est supprimé alors la publications l'est aussi
- Suppression impossible sur la page des publication
- Réduire la répétition du code d'affichage des publications
- Revoir l'affichage des publications
- Trouver une solution pour vérifier que le CDN fonctionne (utiliser une requête asynchrone)
- Si la page de redirection est la page elle même on redirige sur la page d'accueil
- Les notifications flash ne s'affichent pas sur la page de recherche
- Améliorer la prise en charge des liens dans les publications
  - Lien de type www.domaine.extension, domain.extension
- Lors d'une suppression, l'auteur n'est pas prévenu
- Faire la distinction entre date création et date de publication et de fin de la publication
- Lorsque la certification d'une publiction est annulée, la publication doit être bloquée (seul certains utilisateur pourront éffectuer cette action)