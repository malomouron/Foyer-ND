# Foyer-ND - Gestion des Shifts pour l'Association du Lycée Notre Dame

Foyer-ND est une application web qui permet la gestion des shifts pour les participants à l'association du lycée Notre Dame. Elle facilite l'organisation et la planification des horaires des bénévoles, en offrant une interface intuitive pour consulter et gérer les plannings.

## Prérequis

- **PHP** version 7.4 ou plus
- **MySQL** ou **MariaDB** pour la base de données
- **Apache** ou tout autre serveur web compatible avec PHP

## Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/malomouron/Foyer-ND.git
cd foyer-nd
```

### 2. Configuration de la base de données

1. Importez le modèle de base de données fourni [ici](https://github.com/malomouron/Foyer-ND/blob/main/FoyerND.sql) :

   - Utilisez un client MySQL ou phpMyAdmin pour importer le fichier SQL du modèle :
   
     ```bash
     mysql -u votre_utilisateur -p votre_base_de_donnees < chemin/vers/le/modele_de_base.sql
     ```

2. Configurez le fichier `config.foyer.inc.php` en remplissant les informations de connexion à la base de données :

   ```php
   <?php
      // config.inc.php
   
   	$servername = "localhost";
   	$username = "root";
   	$password = "";
   	$dbname = "";
   	$domaine = 'localhost';
   	$expediteur   = 'email@domain.com';
   	$site_key = ''; //G-capcha key
   	$myprivatekey = "";
    	$mdp_foyer = "admin1234"
   ?>
	
   ```

### 4. Démarrage de l'application

- Assurez-vous que votre serveur web est configuré pour exécuter des scripts PHP.
- Accédez à votre projet via l'URL locale (ex. : `http://localhost/foyer/`).

## Fonctionnalités

- Gestion des shifts pour les participants de l'association
- Planification des horaires bénévoles
- Consultation des plannings
- Suivi des heures effectuées par chaque participant

## Support

Pour toute question ou problème, merci de contacter l'équipe de développement ou de créer une issue sur le dépôt GitHub.

## Contributions

Les contributions sont les bienvenues ! Si vous souhaitez apporter des améliorations ou ajouter des fonctionnalités, n'hésitez pas à ouvrir une issue ou à soumettre une pull request.
