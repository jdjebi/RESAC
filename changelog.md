# Version 5.3.2

- Classe forms/Form.php
  - Ajout de la fonction issetError

- Ajout d'une nouvelle configuration
  - var.resac_email = contactresacd@gmail.com

# Version 5.3.1

### 05-04-21

- RoleFactory
  - Ajout des permissions

- Mise à jour du Seeder
  - Création d'un seeder pour les permissions - PermissionSeeder
  - Création d'un seeder pour l'association des rôles et permissions - RolePermissionSeeder

- Middleware de connexion administrateur
  - Ajout de la règle de non connexion del'utilisateur