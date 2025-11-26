<?php
require 'db.php';
if ($_POST) {
    $titulo = $_POST['titulo'];
    $stmt = $pdo->prepare("INSERT INTO tarefas (titulo) VALUES (?)");
    $stmt->execute([$titulo]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Nova Tarefa</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h3>Adicionar Tarefa</h3>
    <form method="post">
        <input name="titulo" class="form-control mb-3" placeholder="Título">
        <button class="btn btn-success">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>