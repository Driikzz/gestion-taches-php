<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tâches</title>
</head>
<body>

<nav>
    <div >
        <a  href="/">Gestion des Tâches</a>
        <div class="">
            <?php if (isset($_SESSION["user_id"])): ?>
                <a href="/tasks" >Mes Tâches</a>
                <a href="/logout" >Déconnexion</a>
            <?php else: ?>
                <a href="/register">Inscription</a>
                <a href="/">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div>
