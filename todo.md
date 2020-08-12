# A FAIRE
- Revision de la page de profil
- Utiliser Dropbox comme CDN pour les photos


# v5
- Version mobile de l'interface
- Optimiser la plateforme
- Intégrer les modérateurs et les super utilisateurs
- Utiliser un nom utilisateur pour identifier un utilisateur

- Modification des publications
- Gestion des publications côtés utilisateur [Améliorer]
  - Gérer la supression, l'affichage propre ainsi que l'édition des publications
- Corriger l'utilisation des photos de profil sur toutes les pages concernées
- Revoir les photos dans l'admin
---
- Vérifier l'existence d'un fichier avant de retourner son chemin
- Gestion des utilisateurs
  - [?] Un admin lui ne pas se rendre membre ni se supprimer
  - Gestion des utilisateurs
    - [?] Suppression ajax des utilisateurs
    - Révision de la page d'accueil
- Trouver suivre le stockage des images sur dropbox
- Renforcer l'accéssibilité aux photos de profil

---

- Créer une documentation

- Conservation de session. Récupérer les l'utilisateurs uniquement via la auth de laravel (il reste l'administration) et autre bugs lié
- Revoir la barre de recherche

- Créer une section pour faire des flash infos

- Créer une historique de navigation en terme de flyers - information qui une fois disparait ou disparait après un certains temps (utiliser ). Ces derniers sont rédiger par un admin

- Guide lors de la connexion

# FAIT


# Brainstorming
- Ajout des utilisateurs de type modérateur
- Ajout des photos de profil en se basant sur le nom


# Extras
- Améliorer les pages utilisateur visiteur
- Créer un middleware pour assurer la mise à jour du compte de l'utilisateur (le middleware va déconnecter l'utilisateur pour qu'il se reconnecte afin d'opérer la mise à jour globale)
- Utiliser ajax pour les annonces
- user_author_id Retirer le delete CASCADE
- Faire la création de compte avec Laravel
- Révoir l'affichage des erreurs sur la page de connexion (toutes les pages)
- Une Espace dédié à chaque administrateur
- Revoir les middlewares spécifiques au api
- La Certification des publications n'enregistre que l'utilisateur qui a fait l'opération courante (validate_by) c'est à dire validation ou annulation on ne peut donc pas connaitre l'utilisateur qui avait validé une publication après que celle ai été annulé en terme de certification
- Création d'une table pour la gestion de la validation des publications
- Admin ne doit pas pouvoir supprimer une publications venant de utilisateur (modérateur)
- La publication appartient à un utilisateur
  - Supprimer un utilisateur revient à supprimer toutes ses publications
- Intégrer une étape de mise à jour de compte après la réussite de la connexion(app/admin)
- Breadcumb dans l'administration
- Controller la sécurité des API
- Design de la page lorsque la base de donnée est inaccéssible non fait (A revoir)
- Améliorer l'affiche des erreurs avec Ajax
- Indicatif du numéro
- Créer une création de compte en backend
- Gestion de l'activation de compte
- Définir une couleur par de défaut pour chaque utilisateur
- Suggestion de profil
- Généraliser la validateur présent dans la classe UserForm
- Retirer l'utilsation extra de la fonction trim dans les méthodes liées au formulaire
- Gérer le cas des MULPILE ERRORS ON ONE FIELD
- Lorsque tous les champs obligatoires ne sont pas remplit aucune validation n'est faite
- Dans les publications(dans le constructeur), si l'id d'un utilisateur n'exsite pas alors ce dernier ne sera pas instancié donc l'affichage sera de la publication au niveau du nom de l'auteur sera érroné voir rien ne va s'afficher ou il y'aura une erreur (Pas delete CASCADE)
- Suggestion !important
- Tous le champs du formulaire de paramètre ne subissent pas de style en cas d'erreur
- Intégrer le marquer comme lu
- Publication de contenu
  - Pas de limite textuelle

- Liens
  - Linkedin
  - Facebook
  - Instagram

- Publication V1
  - Id
  - Auteur
  - Visibilité
  - Type
  - Date
  - Contenu
