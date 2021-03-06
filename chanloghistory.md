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
