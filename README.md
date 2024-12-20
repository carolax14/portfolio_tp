# portfolio_tp

# Documentation du Projet Web Portfolio

## Table des Matières

1. [Description du Projet](#description-du-projet)
2. [Fonctionnalités](#fonctionnalités)
3. [Installation](#installation)
   - [Pré-requis](#pré-requis)
   - [Configuration de Laragon](#configuration-de-laragon)
   - [Base de Données](#base-de-données)
   - [Installation des Fichiers](#installation-des-fichiers)
4. [Structure des Fichiers](#structure-des-fichiers)
5. [Utilisation](#utilisation)

---

## Description du Projet

Ce projet est un portfolio personnel destiné à présenter le parcours, les projets, et les compétences. Il inclut également un page d'administration permettant de gérer les projets via des fonctionnalités CRUD (Create, Read, Update, Delete).

## Fonctionnalités

- **Accueil** : Présentation du portfolio et navigation simple.
- **À Propos** : Informations sur l'utilisateur.
- **Parcours** : Historique des études et expériences professionnelles.
- **Projets** : Affichage des projets avec leurs détails.
- **Contact** : Formulaire pour entrer en contact.
- **Panneau Admin** :
  - Connexion sécurisée.
  - Gestion des projets (ajout, modification, suppression).
  - Affichage de statistiques.

---

## Installation

### Pré-requis

- [Laragon](https://laragon.org/download/)
- PHP >= 7.4
- MySQL
- Navigateur Web

### Configuration de Laragon

1. Téléchargez et installez Laragon.
2. Placez les fichiers du projet dans le dossier `C:\laragon\www\portfolio`.
3. Lancez Laragon et démarrez le serveur Apache et MySQL.

### Base de Données

1. Accédez à `http://localhost/phpmyadmin` via votre navigateur.
2. Créez une nouvelle base de données nommée `portfolio`.
3. Importez le fichier SQL suivant dans cette base de données :
   - **`portfolio.sql`** (à créer si absent, contenant les tables `projects`, `users`, etc.)

### Installation des Fichiers

1. Placez les fichiers dans le dossier `C:\laragon\www\portfolio`.
2. Configurez le fichier `db.php` :
   ```php
   $host = '127.0.0.1';
   $user = 'root';
   $password = '';
   $database = 'portfolio';
   $conn = new mysqli($host, $user, $password, $database);
   if ($conn->connect_error) {
       die("Erreur de connexion : " . $conn->connect_error);
   }
   ```

### Identifiant Administrateur

- Utilisateur : admin
- Mot de passe : password123
