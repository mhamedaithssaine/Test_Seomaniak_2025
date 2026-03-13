# Gestion de Contacts - Mini-projet Laravel 12

<p align="center">
  Application web CRUD de gestion de contacts, construite avec <strong>Laravel 12</strong>,
  une architecture en couches (Request / Repository / Service / Controller),
  et une interface moderne en Blade + CSS + JavaScript.
</p>

---

## Sommaire

- [Objectif du projet](#objectif-du-projet)
- [Stack technique](#stack-technique)
- [Fonctionnalites](#fonctionnalites)
- [Architecture et structure](#architecture-et-structure)
- [Routes principales](#routes-principales)
- [Regles metier et validation](#regles-metier-et-validation)
- [Installation et lancement](#installation-et-lancement)
- [Qualite et bonnes pratiques](#qualite-et-bonnes-pratiques)
- [Pistes d'amelioration](#pistes-damelioration)

---

## Objectif du projet

Ce projet propose une base professionnelle, claire et maintenable pour gerer des contacts :

- creation
- consultation de la liste
- affichage detaille
- modification
- suppression avec confirmation

---

## Stack technique

### Backend

- PHP 8.2+
- Laravel 12
- MySQL

### Frontend

- Blade (moteur de templates Laravel)
- CSS personnalise : public/css/contacts.css
- JavaScript vanilla : public/js/delete-confirm.js
- SweetAlert2 (CDN) pour la confirmation de suppression

### Outils

- Composer
- Vite
- Git et GitHub

---

## Fonctionnalites

- Create : formulaire de creation avec validation serveur
- Read (liste) : affichage pagine des contacts
- Show : page detail d'un contact
- Update : modification d'un contact existant
- Delete : suppression avec confirmation SweetAlert2

### Champs d'un contact

- first_name
- last_name
- email (unique)
- phone
- notes (optionnel)

---

## Architecture et structure

Le projet suit une separation claire des responsabilites :

- Form Requests : validation centralisee des donnees entrantes
- Repository : acces aux donnees isole via une interface
- Service : logique metier
- Controller : orchestration HTTP
- Views Blade : rendu de l'interface

### Structure du projet

```text
gestion-contacts/
|-- app/
|   |-- Http/
|   |   |-- Controllers/ContactController.php
|   |   `-- Requests/
|   |       |-- StoreContactRequest.php
|   |       `-- UpdateContactRequest.php
|   |-- Models/Contact.php
|   |-- Repositories/
|   |   |-- ContactRepositoryInterface.php
|   |   `-- EloquentContactRepository.php
|   |-- Services/ContactService.php
|   `-- Providers/AppServiceProvider.php
|-- database/migrations/2026_03_12_000000_create_contacts_table.php
|-- public/
|   |-- css/contacts.css
|   `-- js/delete-confirm.js
|-- resources/views/
|   |-- layouts/app.blade.php
|   `-- contacts/
|       |-- index.blade.php
|       |-- create.blade.php
|       |-- edit.blade.php
|       |-- show.blade.php
|       `-- _form.blade.php
`-- routes/web.php
```

### Dossiers et fichiers importants

- app/Models/Contact.php : modele Eloquent
- database/migrations/2026_03_12_000000_create_contacts_table.php : migration table contacts
- app/Http/Controllers/ContactController.php : actions CRUD
- app/Http/Requests/StoreContactRequest.php : validation creation
- app/Http/Requests/UpdateContactRequest.php : validation mise a jour
- app/Repositories/ContactRepositoryInterface.php : contrat repository
- app/Repositories/EloquentContactRepository.php : implementation repository
- app/Services/ContactService.php : logique metier
- app/Providers/AppServiceProvider.php : binding interface -> implementation
- routes/web.php : routes web
- resources/views/layouts/app.blade.php : layout principal
- resources/views/contacts/ : vues contacts (index, create, edit, show, _form)
- public/css/contacts.css : style principal
- public/js/delete-confirm.js : confirmation suppression

---

## Routes principales

| Methode | URI                 | Nom              | Description |
|--------:|---------------------|------------------|-------------|
| GET     | /                   | -                | Redirection vers la liste des contacts |
| GET     | /contacts           | contacts.index   | Liste paginee des contacts |
| GET     | /contacts/create    | contacts.create  | Formulaire de creation |
| POST    | /contacts           | contacts.store   | Enregistrer un nouveau contact |
| GET     | /contacts/{id}      | contacts.show    | Afficher le detail d'un contact |
| GET     | /contacts/{id}/edit | contacts.edit    | Formulaire de modification |
| PUT     | /contacts/{id}      | contacts.update  | Mettre a jour un contact |
| DELETE  | /contacts/{id}      | contacts.destroy | Supprimer un contact |

---

## Regles metier et validation

Validation via Form Requests :

- first_name, last_name : requis, chaine, min 3, max 100
- email : requis, format email, max 150, unique
- phone : requis, regex Maroc
  - +212 suivi de 9 chiffres
  - ou 06/07 suivi de 8 chiffres
- notes : optionnel

Contrainte importante : en mise a jour, l'unicite email ignore le contact courant.

---

## Installation et lancement

### Prerequis

- PHP 8.2 ou superieur
- Composer
- MySQL

### Etapes

1. Cloner le depot
2. Installer les dependances
3. Configurer l'environnement
4. Executer les migrations
5. Lancer le serveur local

```bash
git clone https://github.com/mhamedaithssaine/Test_Seomaniak_2025.git
cd gestion-contacts
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Configurer la base de donnees dans .env avant la migration :

- DB_CONNECTION=mysql
- DB_URL=
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=gestions_contacts
- DB_USERNAME=root
- DB_PASSWORD=

Acces application :

- http://127.0.0.1:8000

---

## Qualite et bonnes pratiques

- Controllers fins : logique metier deleguee au service
- Repository pattern pour decoupler l'acces aux donnees
- Validation serveur systematique via Form Requests
- Separation claire des couches
- Frontend sans scripts ni styles inline

---

## Pistes d'amelioration

- Ajouter des tests Feature pour les scenarios CRUD
- Ajouter une authentification utilisateur
- Ajouter une recherche et des filtres avances
- Ajouter Docker pour standardiser l'environnement de developpement
