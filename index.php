<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chamados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados do formulário foram enviados e define variáveis com valores padrão
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $local = isset($_POST['local']) ? $_POST['local'] : '';
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
    $tipo_equipamento = isset($_POST['tipo_equipamento']) ? $_POST['tipo_equipamento'] : '';
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';

    // Insere os dados na tabela chamados
    $sql = "INSERT INTO chamados (telefone, local, usuario, descricao, tipo_equipamento, categoria)
            VALUES ('$telefone', '$local', '$usuario', '$descricao', '$tipo_equipamento', '$categoria')";

    if ($conn->query($sql) === TRUE) {
        echo "Chamado aberto com sucesso!";
    } else {
        echo "Erro ao abrir chamado: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Abrir Chamado - Helpdesk</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary: #111;
      --accent: #ff9900;
      --accent-hover: #e68a00;
      --background: #f4f4f4;
      --light: #1a1a1a;
      --gray: #888;
      --white: #fff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }

    body {
      background-color: var(--background);
      color: #333;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1rem;
    }

    .container {
      background-color: var(--white);
      width: 80%;
      max-width: 1000px;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      padding: 2rem;
    }

    .header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .header h1 {
      font-size: 2rem;
      color: var(--accent);
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group label {
      font-weight: 600;
      color: var(--primary);
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 1rem;
      margin-top: 0.5rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    .form-group textarea {
      height: 100px;
      resize: none;
    }

    .button {
      display: inline-block;
      background-color: var(--accent);
      color: #fff;
      padding: 0.75rem 2rem;
      border-radius: 30px;
      font-weight: bold;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .button:hover {
      background-color: var(--accent-hover);
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="header">
      <h1>Abrir Chamado</h1>
    </div>

    <form method="POST" action="">
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
      </div>

      <div class="form-group">
        <label for="local">Local:</label>
        <input type="text" id="local" name="local" required>
      </div>

      <div class="form-group">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>

      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
      </div>

      <div class="form-group">
        <label for="tipo_equipamento">Tipo de Equipamento:</label>
        <input type="text" id="tipo_equipamento" name="tipo_equipamento" required>
      </div>

      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
          <option value="Hardware">Hardware</option>
          <option value="Software">Software</option>
          <option value="Rede">Rede</option>
          <option value="Impressora">Impressora</option>
          <option value="Outros">Outros</option>
        </select>
      </div>

      <button type="submit" class="button">Enviar Chamado</button>
    </form>
  </div>

</body>
</html>
