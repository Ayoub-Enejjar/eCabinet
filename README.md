<div align="center">

![eCabinet Logo](public/images/favicon.jpg)

</div>

# eCabinet - Système de Gestion Clinique Intelligent

![eCabinet Dashboard Preview](public/images/project_preview.png)

eCabinet est une application web moderne conçue pour simplifier la gestion quotidienne des cabinets médicaux. Elle offre une plateforme collaborative permettant aux médecins, secrétaires et patients de communiquer et de gérer les soins de manière efficace.

## 🚀 Fonctionnalités Clés

### 👨‍⚕️ Espace Médecin
- **Tableau de bord dynamique** : Aperçu des rendez-vous du jour et statistiques.
- **Gestion des patients** : Accès complet aux dossiers médicaux et historique.
- **Consultations Digitales** : Saisie des observations, diagnostics et mesures (tension, poids, etc.).
- **Prescriptions PDF** : Génération automatique d'ordonnances professionnelles avec signature numérique.
- **Planning Flexible** : Gestion des disponibilités et des créneaux horaires.

### 👩‍💼 Espace Secrétaire
- **Gestion des RDV** : Confirmation, annulation et suivi des rendez-vous en temps réel.
- **Accueil Patients** : Enregistrement et mise à jour des informations patients.
- **Notifications** : Alertes sur les nouvelles demandes de rendez-vous.

### 👤 Espace Patient
- **Prise de RDV en ligne** : Interface intuitive pour choisir son médecin et son créneau.
- **Dossier Médical** : Consultation de l'historique et téléchargement des ordonnances.
- **Notifications** : Suivi du statut des demandes (Confirmé / Annulé).

### 🛡️ Administration
- **Gestion des utilisateurs** : Contrôle total sur les comptes médecins et secrétaires.
- **Audit et Sécurité** : Architecture robuste avec gestion fine des permissions (Middleware).

## 🛠️ Stack Technique

- **Backend** : Laravel 12 (PHP 8.2+)
- **Frontend** : Tailwind CSS, Blade, JavaScript (Vite)
- **Base de données** : MySQL
- **PDF** : DomPDF (Génération d'ordonnances)
- **Déploiement** : Docker & Railway

## 📦 Installation Locale

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/Ayoub-Enejjar/eCabinet.git
   cd eCabinet
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   npm install
   ```

3. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrations et Seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Lancer l'application**
   ```bash
   npm run dev
   ```

## 🌐 Déploiement

L'application est optimisée pour un déploiement continu sur **Railway**. Elle inclut un `Dockerfile` configuré avec les extensions PHP nécessaires (GD pour les PDF, etc.).

---
*Développé avec passion pour une médecine plus connectée.*
