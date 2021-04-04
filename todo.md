# A FAIRE

# Version 5.3 (Master)


# version 5.3.x ou plus
- Affichage des suggestions sur la page de profil
- Modification des suggestions
- Pagination dans l'affichage des suggestions sur la page des suggestions côté membre et administrateur 
- Notifier les administrateurs de la création d'une suggestion
- Système de signalement (Support)

# Version 6
- Messagerie instannées
- Gestion des écoles, académies et entreprises
- Gestion des pays
---
- Ajout d'un système d'adhésion à la plateforme depuis un formulaire d'inscription (Contributeur Bosson)
- Ajout d'une page d'une contact avec le mail de RESAC

# FAIT


## EXTRAS
- Mettre en place un système d'initialisation de la plateforme
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