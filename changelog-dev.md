# Version 5.3

### 22-03-21

- Affichage des suggestions dans l'administration par ordre de création décroissant

- Intégration des règles de gestion d'une suggestion
  - Une note de suggestion est égale à la moyenne des notes
  - Les notes des suggestions vont de 0 à 5, cela est représentée simplement par des étoiles 
  - Toutes les suggestions s'affichent avec leur notation
  - Les suggestions affichées dans une section "Mes suggestions" c'est qu'il s'agit de la liste des suggestions créées par l'utilisateur alors la possibilité de la modifier ou de la supprimer est affichée 
  - Un utilisateur ne peut pas noter sa propre suggestion ou noter plusieurs celle d'un autre
  - Lorsqu'une suggestion affichée est celle de l'utilisateur l'ayant créé alors une mention "Ma suggestion" est mise en évidence sans la possibilité de notation
  - Lorsqu'une suggestion affichée est celle d'un autre utilisateur alors l'utilisateur peut la noter
  - Lorsqu'une suggestion affichée a déjà été notée par l'utilisateur alors une mention "Ma note" est mise en évidence avec affichage de la note attribuée
  - En affichage mobile, les suggestions sont accéssibles depuis le menu de naviguation et dans la barre des menus depuis l'option créer

### 10-03-21

- Page des suggestions
  - Affichage des suggestions
  - Affichage de mes suggestions
    - Suppression
    
- Affichage des 3 dernières suggestions sur la page d'actualité avec la possibilité de noter

- Ajout de l'attribut user_author_type à la migration utilisé pour définir une relation 1 à plusieurs avec Laravel

- Ajout d'une relation many to many entre la table des suggestions et celles des utilisateurs pour la gestion des notations
  - Voir Suggestion.noteurs, Suggestion, UserSuggestionResource
  - Retrait des attributs noteurs et note au profit de la table suggestion_user pour la notation