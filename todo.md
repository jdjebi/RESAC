# A FAIRE

- Gestion des utilisateurs
  - [x] Recherche d'utilisateur
  - [?] Un admin lui ne pas se rendre membre ni se supprimer
  - [?] Ajout des middlewares

- Base de l'administration
  - [?] Gestion des nouveautés
  - [x] Gestion des droits


- Revision de tous les middlewares
----
- Guide lors de l'inscription
- Explorer pour rechercher des profils

- Revision de la page de profil

- Intégrer la page de recherche à l'administration

- Explorer devient un annuaire

- Amélioration de la recherche (nom + prenom)

----
- Gestion des utilisateurs
  - [?] Suppression ajax des utilisateurs

# v4
- Utiliser un nom utilisateur pour identifier un utilisateur
- Intégrer la recherche à l'application principale
- Conservation de session


# FAIT
- Mise en place du système de connexion administrateur


# Brainstorming
- Ajout des utilisateurs de type modérateur


# Extras
- Revoir les middlewares spécifiques au api
- Les recherches de type nom + prenom ne marche pas
- La Certification des publications n'enregistre que l'utilisateur qui a fait l'opération courante (validate_by) c'est à dire validation ou annulation on ne peut donc pas connaitre l'utilisateur qui avait validé une publication après que celle ai été annulé en terme de certification
- Création d'une table pour la gestion de la valisation des publications
- Admin ne doit pas pouvoir supprimer une publications venant de utilisateur
- La publication appartient à un utilisateur
  - Supprimer un utilisateur revient à supprimer toutes ses publications
- Intégrer une étape de mise à jour de compte après la réussite de la connexion(app/admin)
- Changer l'encodage des textes dans la base de données en ligne
- Breadcumb dans l'administration
- Controller la sécurité des API
- Design de la page lorsque la base de donnée est inaccéssible non fait (A revoir)
- Améliorer l'affiche des erreurs avec Ajax
- Indicatif du numéro
- Améliorer la diffusion des nouveautés
- Créer une création de compte en backend
- Explorer ordonner les résultats par date d'inscription
- Gestion de l'activation de compte
- Définir une couleur par de défaut pour chaque utilisateur
- Suggestion de profil
- Généraliser la validateur présent dans la classe UserForm
- Retirer l'utilsation extra de la fonction trim dans les méthodes liées au formulaire
- Gérer le cas des MULPILE ERRORS ON ONE FIELD
- Lorsque tous les champs obligatoires ne sont pas remplit aucune validation n'est faite
- Dans les publications(dans le constructeur), si l'id d'un utilisateur n'exsite pas alors ce dernier ne sera pas instancié donc l'affichage sera de la publication au niveau du nom de l'auteur sera érroné voir rien ne va s'afficher ou il y'aura une erreur (Pas delete CASCADE)
- Tous le champs du formulaire de paramètre ne subissent pas de style en vas d'erreur
- Intégrer le marquer comme lu
- Publication de contenu
  - Pas de limite textuelle
- Blading
  - Inscription
  - Explorer

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
