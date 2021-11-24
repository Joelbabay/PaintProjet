# Paint Project
Projet simple de blog pour un paintre

## Environnement de développement

### Pré-requis

* PHP 8.0
* Composer
* Symfony CLI
* Docker
* Docker-compose
* nodejs et npm

### Lancer l'environnement de développement

````bash
composer install
npm install
yarn install
npm run build
docker-compose up -d
symfony serve -d
````

### Ajout des données de test

````bash
symfony console doctrine:fixtures:load
````