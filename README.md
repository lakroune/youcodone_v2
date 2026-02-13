# youcodone – Plateforme de Réservation Gastronomique

![Cibo Gustoso Logo](https://via.placeholder.com/150x150/FF6B35/FFFFFF?text=y)

##  Description

**youcodone** est une plateforme web premium qui connecte **amateurs de gastronomie** et **restaurateurs d'exception**. Inspirée par l'élégance italienne, elle offre une expérience de réservation raffinée et intuitive.

&gt; *"La bonne cuisine est la base du véritable bonheur."*

---

##  Fonctionnalités Clés

###  Authentification & Sécurité

| Fonctionnalité                    | Description                            |
| --------------------------------- | -------------------------------------- |
| **Inscription multi-rôles**       | Client ou Restaurateur avec validation |
| **Connexion sécurisée**           | Laravel Breeze + remember me           |
| **Réinitialisation mot de passe** | Email avec token sécurisé              |
| **Vérification email**            | Confirmation d'adresse obligatoire     |
| **Authentification sociale**      | Google OAuth (optionnel)               |

---

###  Espace Personnel

| Fonctionnalité             | Description                        |
| -------------------------- | ---------------------------------- |
| **Avatar personnalisable** | Upload d'image avec preview        |
| **Profil complet**         | Nom, email, téléphone, adresse     |
| **Historique d'activité**  | Réservations et favoris            |
| **Suppression de compte**  | Avec confirmation par mot de passe |

---

###  Pour les Clients (Gourmets)

| Fonctionnalité                | Description                              |
| ----------------------------- | ---------------------------------------- |
| **Recherche intelligente**    | Par ville, cuisine, nom, prix            |
| **Filtres avancés**           | Type de cuisine, horaires, disponibilité |
| **Galerie immersive**         | Carousel de photos style "film"          |
| **Fiches détaillées**         | Menu, horaires, localisation, avis       |
| **Système de favoris**        | ❤️ Sauvegarde des restaurants préférés    |
| **Réservation en temps réel** | Vérification des disponibilités          |
| **Paiement sécurisé**         | Stripe & PayPal intégrés                 |
| **Notifications email**       | Confirmation et rappels                  |
| **Historique complet**        | Toutes les réservations passées          |

---

###  Pour les Restaurateurs

| Fonctionnalité               | Description                                |
| ---------------------------- | ------------------------------------------ |
| **Dashboard élégant**        | Vue d'ensemble des établissements          |
| **CRUD complet**             | Créer, modifier, supprimer des restaurants |
| **Gestion des photos**       | Upload multiple avec preview               |
| **Menu interactif**          | Ajout de plats avec prix et descriptions   |
| **Horaires dynamiques**      | Configuration jour par jour                |
| **Notifications temps réel** | Alertes de nouvelles réservations          |
| **Statistiques**             | Nombre de réservations, revenus            |

---

<!-- ###  Pour les Administrateurs -->

<!-- | Fonctionnalité | Description | -->
<!-- |----------------|-------------| -->
<!-- | **Dashboard global** | Statistiques plateforme | -->
<!-- | **Gestion des utilisateurs** | CRUD complet, assignation de rôles | -->
<!-- | **Modération** | Validation des restaurants | -->
<!-- | **Logs d'activité** | Historique des actions | -->
<!-- | **Export de données** | CSV, PDF des rapports | -->

<!-- --- -->

##  Système de Paiement

| Fonctionnalité                  | Description                      |
| ------------------------------- | -------------------------------- |
| **Stripe**                      | Cartes bancaires internationales |
| **PayPal**                      | Paiement express                 |
| **Paiement à l'avance**         | Garantie de réservation          |
| **Remboursement**               | Annulation selon conditions      |
| **Historique des transactions** | Reçus et factures                |

---

##  Système de Notifications

| Type                            | Déclencheur               |
| ------------------------------- | ------------------------- |
| **Confirmation de réservation** | Paiement validé           |
| **Rappel de réservation**       | 24h avant le rendez-vous  |
| **Nouvelle réservation**        | Pour le restaurateur      |
| **Annulation**                  | Client ou restaurateur    |
| **Modification**                | Changement d'horaire/date |

---

##  Design & UX

| Caractéristique   | Détail                                          |
| ----------------- | ----------------------------------------------- |
| **Style visuel**  | Élégance italienne, dark mode premium           |
| **Typographie**   | Playfair Display + Inter                        |
| **Palette**       | Noir profond, terracotta (#FF6B35), blanc cassé |
| **Animations**    | Transitions fluides, micro-interactions         |
| **Responsive**    | Mobile-first, tablette, desktop                 |
| **Accessibilité** | WCAG 2.1 AA compliant                           |

---

##  Stack Technique

| Couche                              | Technologie                      |
| ----------------------------------- | -------------------------------- |
| **Backend**                         | Laravel 11+ (PHP 8.2+)           |
| **Frontend**                        | Blade + Tailwind CSS + Alpine.js |
| **Authentification**                | Laravel Breeze                   |
| **Permissions**                     | Spatie Laravel Permission        |
| **Paiement**                        | Stripe SDK + PayPal API          |
| **Email**                           | Laravel Mail + Markdown          |
| <!--                                | **Stockage**                     | Laravel Storage (local/S3)    | --> |
| **Base de données**  PostgreSQL 15+ |
| <!--                                | **Cache**                        | Redis (optionnel)             | --> |
| <!--                                | **Queue**                        | Laravel Queue (notifications) | --> |

---

##  Installation

### 1️ Prérequis

```bash
PHP &gt;= 8.2
Composer &gt;= 2.5
Node.js &gt;= 18
MySQL &gt;= 8.0 ou PostgreSQL &gt;= 15

```
### Cloner et installer
# Cloner le repository
``git clone https://github.com/lakroune/youcodone2.git
cd youcodone2``

# Installer les dépendances PHP
``composer install
``
# Copier l'environnement
``cp .env.example .env
php artisan key:generate
``
### Configuration base de données
# Modifier .env avec vos credentials DB

``DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=youcodone
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
``
# Lancer les migrations
``php artisan migrate --seed
``
### Configuration des services

# Storage link pour les images
``php artisan storage:link
``
# Configuration Stripe (dans .env)
``STRIPE_KEY=pk_test_votre_cle
STRIPE_SECRET=sk_test_votre_secret
``
# Configuration email (dans .env)
````MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre_email@gmail.com
MAIL_PASSWORD=votre_mot_de_passe_app
````
# Configuration PayPal (dans .env)
``PAYPAL_CLIENT_ID=votre_client_id
PAYPAL_SECRET=votre_secret``

### Compilation et lancement
# Compiler les assets
``npm run build``

# Ou en développement
``npm run dev``

# Lancer le serveur
````php artisan serve````

## Auteur
Lakroune – Développeur Full-Stack
https://github.com/lakroune
https://linkedin.com/in/lakroune
<p align="center">
  <img src="https://via.placeholder.com/50x50/FF6B35/FFFFFF?text=Y" alt="youcodone" width="50">
  <br>
  <em style="color: #FF6B35;">Youco'Done – L'Art de la Gastronomie</em>
</p>