<?php include 'templates/header.php'; ?>

<h2>Connexion</h2>
<form action="/login" method="POST">
    <label>Email :</label>
    <input type="email" name="email" required>
    <label>Mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">Se connecter</button>
</form>

<?php include 'templates/footer.php'; ?>
