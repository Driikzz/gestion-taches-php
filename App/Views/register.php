<?php  ?>

<h2>Inscription</h2>
<form action="/register" method="POST">
    <label>Nom :</label>
    <input type="text" name="name" required>
    <label>Email :</label>
    <input type="email" name="email" required>
    <label>Mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">S'inscrire</button>
</form>

