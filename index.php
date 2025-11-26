<?php
require 'db.php';
$tarefas = $pdo->query("SELECT * FROM tarefas")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>CRUD Simples</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h2 class="mb-3">Tarefas</h2>
    <a href="create.php" class="btn btn-primary mb-3">+ Nova Tarefa</a>
    <table class="table table-bordered">
        <tr><th>ID</th><th>Título</th><th>Ações</th></tr>
        <?php foreach ($tarefas as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><?= htmlspecialchars($t['titulo']) ?></td>
            <td>
                <a href="edit.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="delete.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Excluir tarefa?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>