# Live coding Symfony / Api Plateform

## Lancer et tester l'application avec Docker

[Installer Docker desktop](https://www.docker.com/products/docker-desktop/) puis lancer la commande ci-dessous.
```bash
docker compose up -d
```

## Ou démarrer le projet en mode développement

Prérequis, installer les outils suivants :
- PHP
  - [Linux](https://php.watch/articles/install-php82-ubuntu-debian)
  - [Mac](https://crunchify.com/how-to-install-php-latest-version-on-macos/)
  - [Windows](https://www.sitepoint.com/how-to-install-php-on-windows/#installphp)
- [Composer](https://getcomposer.org/download/)
- [Symfony CLI](https://symfony.com/download)
- [Yarn](https://classic.yarnpkg.com/lang/en/docs/install/#mac-stable)

<hr>

1. Faire une copie du fichier `.env` en `.env.local`
2. Dans le fichier `.env.local`, pour la variable `DATABASE_URL`, remplacer `mysql_user_name` et `mysql_user_password` par les identifiants d'accès à MySql en local (ligne 27)
3. Puis, lancer les commandes suivantes 
   - `composer install`
   - `yarn install`
   - `php bin/console doctrine:database:create`
   - `php bin/console doctrine:migration:migrate`
   - `php bin/console doctrine:fixtures:load`
4. Lancer le serveur php `symfony server:start`
5. Avec un second terminal, compiler les assets en mode dev avec `yarn dev-server`


## Navigateur

Dans les deux cas, Docker ou mode développement, l'application sera accessible via le navigateur à l'adresse http://localhost:8000.  
L'API est exposée à l'adresse http://localhost:8000/api.

Enjoy!