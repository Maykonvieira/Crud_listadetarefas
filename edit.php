<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tarefas WHERE id = ?");
$stmt->execute([$id]);
$tarefa = $stmt->fetch();
if (!$tarefa) { die("Tarefa não encontrada"); }
if ($_POST) {
    $titulo = $_POST['titulo'];
    $stmt = $pdo->prepare("UPDATE tarefas SET titulo = ? WHERE id = ?");
    $stmt->execute([$titulo, $id]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h3>Editar Tarefa</h3>
    <form method="post">
        <input name="titulo" class="form-control mb-3" value="<?= htmlspecialchars($tarefa['titulo']) ?>">
        <button class="btn btn-success">Atualizar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>