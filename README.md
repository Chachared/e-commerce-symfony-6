
[https://github.com/Chachared/e-commerce-symfony-6](https://github.com/Chachared/e-commerce-symfony-6)

# E-commerce Symfony 6

Ce projet est un exemple d'application e-commerce développée avec le framework Symfony 6. Il offre les fonctionnalités de base d'un site de commerce électronique, telles que la gestion des produits, des catégories, des utilisateurs et des commandes.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants sur votre machine de développement :

-   PHP 8.0 ou une version ultérieure
-   Composer ([https://getcomposer.org/](https://getcomposer.org/))
-   Symfony CLI ([https://symfony.com/download](https://symfony.com/download))

## Installation

1.  Clonez ce dépôt sur votre machine locale en utilisant la commande suivante :
    
    bashCopy code
    
    `git clone https://github.com/Chachared/e-commerce-symfony-6.git` 
    
2.  Accédez au répertoire du projet :
    
    bashCopy code
    
    `cd e-commerce-symfony-6` 
    
3.  Installez les dépendances du projet à l'aide de Composer :
    
    Copy code
    
    `composer install` 
    
4.  Configurez les paramètres de l'application en copiant le fichier `.env` :
    
    bashCopy code
    
    `cp .env .env.local` 
    
    Éditez le fichier `.env.local` et ajustez les paramètres de base de données selon votre environnement.
    
5.  Créez la base de données et exécutez les migrations :
    
    bashCopy code
    
    `php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate` 
    
6.  (Facultatif) Chargez les données de démonstration :
    
    bashCopy code
    
    `php bin/console doctrine:fixtures:load` 
    
7.  Démarrez le serveur de développement :
    
    Copy code
    
    `symfony serve` 
    
    L'application sera accessible à l'adresse `http://localhost:8000`.
