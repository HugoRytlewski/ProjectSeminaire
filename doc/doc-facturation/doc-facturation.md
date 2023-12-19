# Documentation Technique : Système de Facturation de Congressistes

## Table des Matières

1. [Introduction](#introduction)
2. [Architecture du Système](#architecture-du-système)
3. [Description des Modules](#description-des-modules)
4. [Fonctionnalités Principales](#fonctionnalités-principales)
5. [Interface Utilisateur](#interface-utilisateur)
6. [Code Source Exemplaire](#code-source-exemplaire)
7. [Conclusion](#conclusion)
8. [Annexes](#annexes)

## Contexte

L'objectif de ce système est la création et la gestion de factures pour des congressistes. Le système permet la création de factures, leur affichage et filtrage, et fournit des détails sur des factures spécifiques.

## Architecture du Système

Le projet utilise PHP et MySQL, avec l'intégration de la bibliothèque FPDF pour la génération de PDF.

- **Fichiers Principaux**:
  - `bd.facturation.php` : Gestion de la base de données pour les facturations.
  - `vue/entete.html.php`, `vue/VueFacturation.php` : Fichiers de présentation.
  - `modele/fpdf.php` : Bibliothèque pour la création de PDF.

## Description des Modules

- **Congressiste**:
  - `getAllCongressisteNoFacture()` : Récupère tous les congressistes sans facture.
  - `aPrisPetitDejeuner()` : Vérifie si le congressiste a pris le petit déjeuner.
- **Facturation**:
  - `createFacture()`, `ModifierFacture()` : Création et modification de factures.
  - `GetOneFacture()`, `GetAllDetailFacture()`, `GetAllFacture()`, `GetAllFacturePaid()`, `GetAllFactureUnPaid()` : Gestion et récupération de factures.

## Fonctionnalités Principales

- **Création d'une Facture (T2.1)**:
  - Processus de création d'une facture.
  - Calcul du montant total (hôtel, sessions, activités).
- **Affichage et Filtrage des Factures (T2.7)**:
  - Méthodes pour filtrer et afficher les factures.
  - Affichage détaillé d'une facture spécifique.
- **Génération de PDF**:
  - Utilisation de FPDF pour générer un PDF de la facture.

## Interface Utilisateur

- **VueFacturation** :
  - Description de l'interface utilisateur pour la gestion des factures.
  - Interaction avec les formulaires et affichage des résultats.

## Code Source Exemplaire

```php
// Création d'une facture
if (isset($_POST['cr'])) {
   $facture = new facturation(0, $_POST["valeurBooleenne"], $_POST["date"], $_POST["congressiste"], $_POST["montant"]);
   $facture->createFacture();
}
```
**Creation Facture** :

![Texte alternatif](https://i.imgur.com/pPWVVyk.png "creation facture")


```php

// Modification d'une facture
if (isset($_POST['md'])) {
    $facture = new facturation($_POST["id_facture"], $_POST["valeurBooleenne2"], $_POST["date"], $_POST["congressiste"], $_POST["montant"]);
    $facture->ModifierFacture();
}
```
**Choisir Visualisation/Edition Facture** :

![Texte alternatif](https://i.imgur.com/jIYKscI.png "ecran modification facture")
```php

// Calcul du Total de la Facture
$Total = $TotActiv + $TotSession + $TotCong + $PrixPetitDej;

// Filtrage des Factures
if (isset($_GET['filter']) && $_GET['filter'] === 'paid') {
    $facturepaid = new facturation();
    $AllFacture = $facturepaid->GetAllFacturePaid();
}
```
**Detail de la facture** :

![Texte alternatif](https://i.imgur.com/9PRVDab.png " detail facture")
```php

// Génération de PDF
if (isset($_GET['pdf'])){
    $pdf = new FPDF();  x
    // ... Code pour la génération du PDF ...
    $pdf->Output("chemin_du_fichier.pdf", 'F');
}

```
**Facture PDF** :

![Texte alternatif](https://i.imgur.com/2zoqsLN.png "facture pdf")
## Conclusion
 **Résumé des fonctionnalités**:
 - Ce système de facturation pour congressistes offre une solution complète et efficace pour la gestion des paiements et des services liés aux événements. Les fonctionnalités clés, telles que la création, la modification, l'affichage et le filtrage des factures, ainsi que la génération de PDF, rendent le processus de facturation transparent et facile à gérer pour les administrateurs. L'importance de ce système réside dans sa capacité à rationaliser les opérations financières, à réduire les erreurs et à améliorer l'expérience globale des congressistes et des organisateurs d'événements.












