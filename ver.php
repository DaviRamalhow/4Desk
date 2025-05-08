<?php
$conn = new mysqli("localhost", "root", "", "chamados");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$result = $conn->query("SELECT * FROM chamados WHERE id = $id");

if ($result && $result->num_rows > 0) {
    $chamado = $result->fetch_assoc();
} else {
    die("Chamado não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Detalhes do Chamado</title>
  <style>
    body {
      background: #0b0b0b;
      color: #f0f0f0;
      font-family: sans-serif;
      padding: 40px;
    }
    .container {
      background: #1c1c1c;
      padding: 30px;
      border-radius: 10px;
      border: 1px solid #333;
      max-width: 600px;
      margin: auto;
    }
    h2 {
      color: #ff9900;
    }
    p {
      margin-bottom: 12px;
    }
    a {
      color: #ff9900;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Chamado #<?= $chamado['id'] ?></h2>
    <p><strong>Usuário:</strong> <?= htmlspecialchars($chamado['usuario']) ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($chamado['telefone']) ?></p>
    <p><strong>Local:</strong> <?= htmlspecialchars($chamado['local']) ?></p>
    <p><strong>Tipo de Equipamento:</strong> <?= htmlspecialchars($chamado['tipo_equipamento']) ?></p>
    <p><strong>Categoria:</strong> <?= htmlspecialchars($chamado['categoria']) ?></p>
    <p><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($chamado['descricao'])) ?></p>
    <br>
    <a href="listar.php">← Voltar</a>
  </div>
</body>
</html>
