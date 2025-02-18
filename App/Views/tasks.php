<?php ?>
<h2>Liste des tâches</h2>

<form action="/tasks/create" method="POST">
    <label>Titre :</label>
    <input type="text" name="title" required>
    <label>Description :</label>
    <input type="text" name="description" required>
    <button type="submit">Ajouter</button>
</form>

<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= htmlspecialchars($task['title']) ?> - <?= htmlspecialchars($task['status']) ?>
            <form action="/tasks/edit/<?= $task['id'] ?>" method="POST">
              <select name="status">
                  <option value="À faire" <?= $task['status'] == "À faire" ? "selected" : "" ?>>À faire</option>
                  <option value="En cours" <?= $task['status'] == "En cours" ? "selected" : "" ?>>En cours</option>
                  <option value="Terminé" <?= $task['status'] == "Terminé" ? "selected" : "" ?>>Terminé</option>
              </select>
              <button type="submit">Modifier</button>
            </form>
            <form action="/tasks/delete/<?= $task['id'] ?>" method="POST">
                <button type="submit">Supprimer</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

<?php ?>
