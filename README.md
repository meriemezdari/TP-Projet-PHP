# TP PHP / MySQL – Formulaire d'inscription

## Présentation

Ce projet consiste à créer une petite application web permettant de saisir des informations personnelles via un **formulaire d'inscription** et d'enregistrer ces informations dans une **base de données MySQL**.

Le projet contient deux pages principales :

* **inscription.php** : formulaire permettant de saisir les informations (nom, prénom, date de naissance, adresse, ville, téléphone, etc.) et d'enregistrer les données dans la base de données.
* **liste_inscrits.php** : page permettant d'afficher la liste des personnes enregistrées dans la base de données sous forme de tableau.

Les données sont enregistrées dans la base de données **inscription** dans la table **utilisateurs**.

---

## Utilisation du projet

1. Télécharger les fichiers du projet.
2. Placer les fichiers dans le dossier **www** de votre serveur local (XAMPP, WAMP, Docker, etc.).
3. Ouvrir le projet dans un navigateur :

```
http://localhost/projet/inscription.php
```

---

## Aperçu

GitHub ne permet pas d'exécuter les fichiers **PHP** dans le mode *Live Demo*.
Pour cette raison, des **captures d'écran du projet** ont été ajoutées dans ce README.

### Page inscription

![Formulaire inscription](inscription.png)

### Liste des inscrits

![Liste des inscrits](liste_inscrits.png)
