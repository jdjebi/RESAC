# A FAIRE

- Certification côté membre
- Améliorer l'édition des publications
  - [x] Certification des publications (option dispo que pour les post venant des membres)
  - [] Modification des publications
    - [] Modification effective
  - Affichage unique d'une publication
    - [] Pour la fil d'actu


## EXTRAS
- Documenter la nouvelle tables des publications
- Documenter la base de données
- Description du processus de validation la nouvelle tables des publications
- [] Réfuser la certification
- [] Confirmation des actions sur la page d'une publication
  
# v5
- Amélioration du système de permission
- Intégrer les modérateurs et les super utilisateurs

- Gestion des publications côtés utilisateur [Améliorer]
  - Gérer la supression
---
- Gestion des utilisateurs
  - [?] Un admin lui ne pas se rendre membre ni se supprimer
  - Gestion des utilisateurs
    - [?] Suppression ajax des utilisateurs
    - Révision de la page d'accueil

- Gérer le cas au le où le mail ne part pas

# Version 6

- Messagerie instannées
- Traducteur de date
- Gestion des écoles, académies et entreprises
- Gestion des pays
- Pour publier il faut posséder le pays et la commune/quartier
- Importation et visualisation de CV 

# FAIT
- Utiliser Dropbox comme CDN pour les photos
- Revision de la page de profil
- Amélioration de l'affichage des publications
  - Lien cliquable avec coloration des liens
  - Coloration des hashtags
  - Création d'un serveur de fichiers (NodeJS)
- Revoir les photos dans l'admin
- Créer une section pour faire des flash infos
- Revoir la barre de recherche
- Option pour retirer la photo de profil
- Conservation de session. Récupérer les l'utilisateurs uniquement via la auth de laravel (il reste l'administration) et autre bugs lié


# Sécurité
- Revoir la sécurité du controller de certification

# Bugs
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

# Brainstorming
- Ajout des utilisateurs de type modérateur
- Ajout des photos de profil en se basant sur le nom
- Marquage des utilisateurs RESAC
- Message de bienvenue sur RESAC lors de la première connexion
- Utiliser un système de balisage pour la création des publications
- Trouver une solution pour que les messages flash ne se répètent pas s'il en la mm origine ou le mm contenu
- Utiliser un nom utilisateur pour identifier un utilisateur
- Créer une historique de navigation en terme de flyers - information qui une fois disparait ou disparait après un certains temps (utiliser ). Ces derniers sont rédiger par un admin
- Guide lors de la connexion

# Extras
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
