# Pour le prochain déploiement
- Création de la table des notifications 
php artisan migrate

Pour la mise en place des permissions
- php artisan migrate
- Exécuter la commande composer dump-autoload
- php artisan db:seed 

# Indépendance du code liée à la base de données
- Il faut impérativement que la base de données possèdent les tables des permissions et quelles contiennent toutes les permissions de bases sinon l'appli risque de bugger en production comme en dev .En gros, tant que les permissions ne sont pas utilisables le site ne doit pas être accéssible.
# Pour le guide

## Nouveau projet
- Imprtation du nouveau fichier de base de données .sql donc "_v3"
Pour la mise en place des permissions
- Exécuter composer dump-autoload
- php artisan db:seed 

## Ancien projet
Pour la mise en place des permissions
- php artisan migrate
- Exécuter la commande composer dump-autoload
- php artisan db:seed 