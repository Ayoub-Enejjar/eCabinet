<p align="center">
  <img src="https://github.com/Ayoub-Enejjar/eCabinet/raw/main/public/images/favicon.jpg" width="80" alt="eCabinet Logo">
</p>

# eCabinet
### Système de Gestion Clinique Intégré

<p align="center">
  <img src="https://cdn.creativefabrica.com/2021/06/12/Medical-Online-Vector-Concept-Color-Graphics-13280857-1.jpg" width="100%" alt="eCabinet Medical Concept">
</p>

eCabinet est une solution logicielle moderne et sécurisée conçue pour optimiser les flux de travail des cabinets médicaux. Cette plateforme unifiée permet une collaboration fluide entre les médecins, le personnel administratif et les patients, tout en garantissant la confidentialité et la précision du suivi médical.

---

## Fonctionnalités Principales

### Espace Médecin
* **Tableau de Bord Holistique** : Visualisation en temps réel du planning quotidien et des indicateurs clés.
* **Dossier Médical Informatisé (DMI)** : Gestion structurée de l'historique patient et des antécédents.
* **Module de Téléconsultation** : Consultations vidéo sécurisées intégrées via 8x8 JaaS.
* **Prescriptions Numériques** : Génération d'ordonnances PDF haute qualité avec signature électronique.

### Espace Secrétaire
* **Gestion Avancée des Rendez-vous** : Flux de travail optimisé pour la confirmation et le suivi des demandes.
* **Coordination Administrative** : Centralisation des données patients et gestion de l'accueil.
* **Système de Notifications** : Alertes instantanées pour une réactivité maximale.

### Portail Patient
* **Réservation en Ligne** : Système de prise de rendez-vous intuitif avec choix du praticien.
* **Accès au Suivi** : Consultation sécurisée des ordonnances et de l'historique des soins.
* **Communication Directe** : Notifications sur le statut des consultations et rappels.

---

## Spécifications Techniques

* **Architecture Backend** : Laravel 12 / PHP 8.3
* **Interface Frontend** : Tailwind CSS & Blade (Vite)
* **Persistance des Données** : MySQL
* **Services Intégrés** : 
  - **Vidéo** : 8x8 JaaS (Secure SDK)
  - **Documents** : DomPDF (Génération PDF)
* **Infrastructure** : Dockerized Environment / Railway Deployment

---

## Installation et Configuration

### Prérequis
- PHP 8.3+
- Composer
- Node.js & NPM

### Procédure d'installation

1. **Environnement**
   ```bash
   git clone https://github.com/Ayoub-Enejjar/eCabinet.git
   cd eCabinet
   composer install
   npm install
   ```

2. **Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Base de données**
   ```bash
   php artisan migrate --seed
   ```

4. **Exécution**
   ```bash
   npm run dev
   ```

---

## Sécurité et Conformité
L'application utilise des standards de sécurité modernes, incluant le hachage des mots de passe (BCrypt), la protection contre les injections SQL et la gestion des permissions via des Middlewares Laravel personnalisés.

---
*Optimiser le soin par la technologie.*
