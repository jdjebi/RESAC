# A FAIRE

- Créer une news pour les mots de passe oublié
- Créer une news pour la conservation de session
- Revoir les middlewares avec le nouveau service auth2

# v4
- Gérer les comptes la mise à jour des comptes lors de la connexion !important
  - intégrer la fonction de hashage à l'inscription
  - Revoir toutes les méthodes de login
  - Revoir la mise à jour du du mot de passe
  - Revoir le created_at du Modèle utilisateur

- Gestion des publications côtés utilisateur

---
- Conservation de session
- Création de l'index dès l'inscription et à la mise à jour du compte

# v5

- Version mobile de l'interface
- Optimiser la plateforme
- Revision de la page de profil
- Intégrer les modérateurs et les super utilisateurs
- Utiliser un nom utilisateur pour identifier un utilisateur

---
- Gestion des utilisateurs
  - [?] Un admin lui ne pas se rendre membre ni se supprimer
  - Gestion des utilisateurs
    - [?] Suppression ajax des utilisateurs
    - Révision de la page d'accueil


---

- Utiliser ajax pour les annonces

# FAIT
- Mot de passe oublié



# Brainstorming
- Ajout des utilisateurs de type modérateur


# Extras
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
- Tous le champs du formulaire de paramètre ne subissent pas de style en vas d'erreur
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
