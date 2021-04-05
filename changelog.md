# Version 5.3.1

# Version 5.3

### 22-03-21

- Affichage des suggestions dans l'administration par ordre de création décroissant

- Intégration des règles de gestion d'une suggestion
  - Une note de suggestion est égale à la moyenne des notes
  - Les notes des suggestions vont de 0 à 5, cela est représentée simplement par des étoiles 
  - Toutes les suggestions s'affichent avec leur notation
  - Les suggestions affichées dans une section "Mes suggestions" sont les suggestions créées par l'utilisateur alors la possibilité de la modifier ou de la supprimer est affichée 
  - Un utilisateur ne peut pas noter sa propre suggestion ou noter plusieurs fois celle d'un autre
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


### Ancien

- Ajout d'une page de bienvenue après l'inscription menant vers la page de connexion

- le type de is_staff devient bool pas int
- créer une constante pour le versionnage
- Créer la nouvelle fonction de mise à jour de compte vers la version 3
- Mettre la valeur par défaut de version à 3

# 5.2.1

- Prise en charge du service models annulée

- Suppression des fonctions et classes inutiles

- Le test de la connexion à la base de données se fait dans la class AppServiceProvider et en cas d'echec le fichier dont le chemin est contenu dans "config(var.database_connection_failed)" est affiché. Ce dernier affiche l'erreur sql uniquement si on est en local

- Modification du fichier de migration de la table utilisateur

# v5.2

- Création du fichier `app\Resac\Defines.php` pour la sauvarges de constantes avec comme premier élément RESAC::CURRENT_UPDATE_VERSION qui donne la version courante du pack de mise à jour

### 1-11-2020

- Ajout des constantes des rôles et permssions `database\migrations\2020_10_26_072813_create_notifications_table.php`

### 28-10-2020

- Ajout du package Spatie/Laravel-permission pour les gestions des rôles et permissions (voir `database\migrations\2020_10_28_141909_create_permission_tables.php`)
- Création d'un module pour la gestion des permissions 

### 28-10-2020

- Création des notifications (voir `database\migrations\2020_10_26_072813_create_notifications_table.php`)
- Création d'un models pour les modifications (voir `database\migrations\2020_10_26_072813_create_notifications_table.php`)
- Création d'une page pour l'affichage des notifications 
- Création d'une page tester tester notifications

### 24-10-2020

- Suppression du lien vers la page de publication dans barre de navigation
- Retrait de la box de publication sur la page d'actualité

### 4-10-2020

- Les posts n'utilisent plus la table "pub_v1" pour la gestion des publications mais plutôt la table "posts" - voir le fichier `database\migrations\2020_10_01_091418_create_posts_table.php`
- Révision complète de l'interface de l'administration
- Réorganisation des controllers: les controllers de Backend et de Frontend sont désormais séparés dans des dossiers différents (Backend/ et UI/)
- Amélioration de la prise en charge de Vue.js
- Ajout de Ressources pour les Posts et les utilisateurs - voir `app\Http\Ressources`
- Ajout du helper `UserAuth()` qui retourne une instance de l'utilisateur connecté

### 20-09-2020

- Création d'un nouveau fichier de configuration 'var.php', il contient par exemple le chemin vers la photo de profil par défaut

### 29-08-2020

- Redimensionnement automatique du formulaire de publication sur la page d'accueil
  - Il est assuré par asset/js/lib/autosize.min.js

### v5.1

- Désactivation du cache en ligne à l'aide de la variable d'environement CACHE_DRIVER=none. Les paramètres du cache à none on été ajouté au fichier cache.php dans le but tenter de régler le problème des méthodes renommées en production
- Ajout du les models du dossier app dans le dossier app/Models
- Création d'un controlleur pour la suppression des publications App\Http\Controllers\Resac\Posts\PostDeleteController
- Création d'une classe pour assurer le rendu d'unr publication App\Resac\Core\Posts\PostController
- Création d'un middleware pour autoriser la suppresion d'un post que par le propriétaire ou un admin
- Création de l'utilitaire UserAuth() pour retourner l'instance d'un utilisateur pour éviter l'utilisation de use Resac\Auth2 à répétition

### v5

- Revision de la page de profil
- Amélioration de l'affichage des publications
  - Lien cliquable avec coloration des liens
  - Coloration des hashtags
  - Création d'un serveur de fichiers (NodeJS)
- Création d'une section pour faire des flash infos
- Revision la barre de recherche
- Option pour retirer la photo de profil
- Certification des publications
- Intégrer les modérateurs et les super utilisateurs
- Gestion des utilisateurs
  - Un admin ne peut pas modifier ses droits ni se supprimer, seule le super admin peut gérer les droits
