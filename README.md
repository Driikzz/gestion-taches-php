# 📌 Gestion de Tâches PHP (MVC)

Ce projet est une **application de gestion de tâches** développée en **PHP sans framework**, utilisant une architecture **MVC (Modèle-Vue-Contrôleur)** et une base de données **MySQL**.

---

## 📌 Fonctionnalités
- 🔐 **Gestion des utilisateurs** (Inscription, Connexion)
- ✅ **Gestion des tâches** (Créer, Modifier, Supprimer, Mettre à jour le statut)

---

## ⚙️ Installation et Configuration

### **1️ Prérequis**
Avant de commencer, assurez-vous d'avoir :
- Un serveur local (ex: **WAMP**, **XAMPP**, **MAMP** ou **LAMP**)
- **PHP** installé (version 7.4+ recommandée)
- **MySQL** installé et en cours d'exécution
- **Git** installé sur votre machine

---

### **2️ Cloner le dépôt**
Clonez le projet depuis GitHub et accédez au dossier :
```sh
git clone https://github.com/Driikzz/gestion-taches-php.git
cd gestion-taches-php

```
### **3 database.php**
```php
<?php
$host = '127.0.0.1'; 
$dbname = 'tpphp'; 
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
````
Salles Rémi

