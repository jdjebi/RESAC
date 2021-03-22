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

- Retrait le rôles superutilisateur

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

## v4

- Mot de passe oublié
- Conservation de session
- Gérer les comptes la mise à jour des comptes lors de la connexion
- Création de l'index dès l'inscription et à la mise à jour du compte
- Revoir les middlewares avec le nouveau service auth2
- Revoir la langue de l'E-mail de réinitialisation
- Revoir le langue de base de Laravel
- Création d'une page dans l'admin pour générer des notifications flash plus facilement (app/http/controller/admin/DevController)
- Ajout du photo au Modèle d'un utilisateur
- Affichage des post ne dépend plus Framework built-in

## v3.4

- Ajout du champ version au Modèle d'un utilisateur
- Création d'un nouveau service auth/auth2.php pour gérer la connexion à l'aide des méthodes de Laravel
- Système de mise à jour de compte
- Intégration de la conservation de session
- La connexion à l'admintration utilise desormais les fonctions d'authentification du service auth2
- Le changement de mot de passe est mainteant basé sur la Facade Hash de Laravel
- L'index de recherhce utilisateur est mainteant mise à jour lors de la création et la mise jour d'un utilisateur
- Les middlewares d'authentification sont mainteant basées sur auth2
- Création de la fonction is_current_url pour vérifier si une url est l'url courante

## v3.3

- Table utilisateurs ajout du rememberToken et du timestamp | Faire la migration de add_remember_token pour les ajouter en ligne
- Migration pour la réinitialisation du mot de passe

## v3.2

- Table new_features pour les nouveautés crées avec Laravel
- Table SearchUserIndex, joue le rôle d'index de recherche pour la recherche d'utilisateur

## v3.1

- Amélioration de la prise en charge de Laravel

## v3

- Les fonctionnalités du Framework de base ont été intégré à Laravel comme extension

- Ajout des champs is_staff, staff_role à la table des utilisateurs

- auth, redirect, flash deviennent des services

- Mise de la classe Auth
  
  - Ajout des méthodes is_admin et role
  
  - Modification de la table pub_v1
    
    - Ajout du champ validate
    - Ajout du champ validate_by
    - Ajout du champ validate_at

- Supression en CASCADE sur la les publications avec pour référence la table user

## v2

- src/redirect.php
  
  - Ajout de la methode route_back()

- config/countries.php
  
  - Ajout d'un tableau de tous les pays du monde

- src/services/countries/
  
  - Création des services au travers de l'intégration d'un service pour gérer les pays

- connexion.php
  
  - Auto redirection avec le formuailre de connexion

- src/utils.php
  
  - Ajout de la fonction dump() pour un var_dump avec la fonction pre

- forms/Form.php
  
  - Intégration des fonctionnalités pour la gestion des erreurs par champs
  - Intégration de la vérifcation automatiquement pour:
    - Le format de l'E-mail
    - L'égalité de deux champ(cas des mots de passe)

- forms/RegisterForm.php
  
  - Adaptation de la classe à la nouvelle version de la classe Form

- inscription.php
  
  - Adaptation du traitement à la nouvelle version de la classe RegisterForm
  - Ajout des erreurs manquantes

- forms/UserForm.php
  
  - Adaptation de la classe à la nouvelle version de la classe Form
  - Ajout de la méthode Users::email_is_unique($email)
  - Ajout d'un validateur de format d'adresse E-mail
  - Ajout d'un validateur d'égalité de champ

- parametres.php
  
  - Adaptation de la classe à la nouvelle version de la classe UserForm

- models/Model.php
  
  - Ajout d'une classe de base pour les modèles

- models/Post.php
  
  - Ajout d'une classe pour la présentation des publications
