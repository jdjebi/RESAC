# RESAC

RESAC est la plate-forme du réseau des anciens caïmans. Ici, le dépôt officiel du projet maintenant basé sur **Laravel**. Le projet utilise des fonctionnalités built-in pour assurer des fonctions spécifiques à l'application web du projet.

Lien vers le site: [RESAC](https://resac2.herokuapp.com/).

Consulter le fichier **todo.md** pour suivre l'évolution du développement.

## Capture

![Capture de la page d'accueil](public/asset/doc/screenshot_v2.png)

## Fonctionnalités

### Récentes

- Importation de photo de profil
- Système de notifications
- Système de publications
- Système des gestion des utilisateurs
- Système de permissions

### Anciennes

- Serveur CDN
- Redimensionnement automatique du formulaire de publication (page d'actualité)
- Photo de profil
- Moteur de recherche d'utilisateurs
- Gestion des nouveautés
- Mot de passe oublié
- Actualités
- Gestion des publications
- Administration

## Fonctionnalités built-in principale

- Validateur de formulaire
- Emetteur de notifications

## Mise à jour de la version 5

- Importation de photo de profil
- Système de notifications
- Système de publications
- Système des gestion des utilisateurs
- Système de permissions

## Mise à jour de la version 4

- Mot de passe oublié
- Conservation de session
- Mise à jour des comptes lors de la connexion
- Création de l'index dès l'inscription et à la mise à jour du compte
- Revision des middlewares avec le nouveau service auth2
- Revision de la langue de l'E-mail de réinitialisation
- Revision de la langue de base de Laravel, on passe au français
- Création d'une page dans l'admin pour générer des notifications flash plus facilement (app/http/controller/admin/DevController)
- Ajout de photo au Modèle d'un utilisateur
- l'affichage des post ne dépend plus Framework built-in