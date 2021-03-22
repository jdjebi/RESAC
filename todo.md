# A FAIRE

# Version 5.3 (Master)

# Version 6
- Messagerie instannées
- Gestion des écoles, académies et entreprises
- Gestion des pays

# Bugs
- Retirer le rôles superutilisateur

# FAIT
- Page des suggestions
  - Affichage des suggestions
  - Affichage de mes suggestions
    - Modification
    - Suppression
- Affichage des 3 dernières suggestions sur la page d'actualité
- Ajout d'une relation many to many entre la table des suggestions et celles des utilisateurs pour la gestion des notations
  - Voir Suggestion.noteurs, Suggestion, UserSuggestionResource
  - Retrait des attributs noteurs et note au profit de la table suggestion_user pour la notation

-Règles de gestion d'une suggestion
  - Toutes les suggestions s'affichent avec leur notation
  - Les suggestions affichées dans une section "Mes suggestions" c'est qu'il s'agit de la liste des suggestions créées par l'utilisateur alors la possibilité de la modifier ou de la supprimer est affichée 
  - Un utilisateur ne peut pas noter sa propre suggestion ou noter plusieurs celle d'un autre
  - Lorsqu'une suggestion affichée est celle de l'utilisateur l'ayant créé alors une mention "Ma suggestion" est mise en évidence sans la possibilité de notation
  - Lorsqu'une suggestion affichée est celle d'un autre utilisateur alors l'utilisateur peut la noter
  - Lorsqu'une suggestion affichée a déjà été notée par l'utilisateur alors une mention "Ma note" est mise en évidence avec affichage de la note attribuée

## Version 5.3

- Ajout de l'attribut user_author_type à la migration utilisé pour définir une relation 1 à plusieurs avec Laravel


## Version 5
- le type de is_staff devient bool pas int
- créer une constante pour le versionnage
- Créer la nouvelle fonction de mise à jour de compte vers la version 3
- Mettre la valeur par défaut de version à 3
- Ajout d'une page de bienvenue après l'inscription menant vers la page de connexion

## EXTRAS
- Documenter la nouvelle tables des publications
- Documenter la réinitialisation de mot de passe
- Description du processus de validation la nouvelle tables des publications
- [] Réfuser la certification
- [] Confirmation des actions sur la page d'une publication
- Gestion des demandes de publication
- Gérer le cas au le où le mail ne part pas
- Le nombre de nouveauté doit correspondrent aux nombres de nouveautés présent dans la base de données depuis une semaine
- Importation et visualisation de CV 
- Traducteur de date
- Pour publier il faut posséder le pays et la commune/quartier

# Sécurité
- Revoir la sécurité du controller de certification
- Revoie la sécurité au niveau des pages de rôles et permissions

# Bugs
- S'assurer que les permissions système ne pourront pas être supprimée même pas le superadmin
- Supprimer le on delete cascade sur user.validate_by car si un utilisateur ayant validé une publication est supprimé alors la publications l'est aussi
- Suppression impossible sur la page des publication
- Revoir l'affichage des publications
- Trouver une solution pour vérifier que le CDN fonctionne (utiliser une requête asynchrone)
- Si la page de redirection est la page elle même on redirige sur la page d'accueil
- Les notifications flash ne s'affichent pas sur la page de recherche
- Améliorer la prise en charge des liens dans les publications
  - Lien de type www.domaine.extension, domain.extension
- Lors d'une suppression, l'auteur n'est pas prévenu
- Faire la distinction entre date création et date de publication et de fin de la publication
- Lorsque la certification d'une publiction est annulée, la publication doit être bloquée (seul certains utilisateur pourront éffectuer cette action)