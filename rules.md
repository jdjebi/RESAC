- Seul le créateur d'une nouveauté peut la modifier ou la supprimer

- Lors d'une tentive de connexion on observe deux étapes:
  1. L'authentification: Cette étape permet de s'assurer que les identidiants de l'utilisateur sont correctes. En particulier, elle permet d'essayer plusieurs méthode de hashage au cas ce dernier est changé
  2. La connexion: Cette étape permet d'assurer l'effectivité de la connexion par la création des variables de session de connexion. En particulier, elle permet de mettre à jour les informations liées au compte d'un utilisateur dans le but de garantir la stabilité de l'état des comptes utilisateur

- Pour une publication, seul le propriétaire et un administrateur peuvent la supprimer

- Un hashtag contient: les caracrères alphanumériques et les tirets du 6 et 8

- La photo de profil de l'utilisateur est nommée à partir du l'id de l'utlisateur puis de l'extension du fichier d'origine

## Déploiement 

- Mettre le CDN à jour avant chaque deploiement
