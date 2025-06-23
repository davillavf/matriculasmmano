<?php
include 'header.php';
include 'conexao.php';
session_start();

define('MAX_TENTATIVAS', 7);
define('BLOQUEIO_MINUTOS', 20);
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $pdo = new PDO('mysql:host=localhost;dbname=escola_db;charset=utf8mb4', 'root', '');
    $stmt = $pdo->prepare("SELECT id, senha, tentativas, bloqueio_expira FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $erro = "Usuário ou senha incorretos.";
    } else {
        if ($user['bloqueio_expira']) {
            $agora = new DateTime();
            $bloqueioExpira = new DateTime($user['bloqueio_expira']);
            if ($agora < $bloqueioExpira) {
                $tempoRestante = $bloqueioExpira->getTimestamp() - $agora->getTimestamp();
                $minutos = floor($tempoRestante / 60);
                $segundos = $tempoRestante % 60;
                $erro = "Conta bloqueada. Tente novamente em {$minutos} min e {$segundos} seg.";
            } else {
                $stmt = $pdo->prepare("UPDATE usuarios SET tentativas = 0, bloqueio_expira = NULL WHERE id = ?");
                $stmt->execute([$user['id']]);
                $user['tentativas'] = 0;
            }
        }

        if (empty($erro) && password_verify($senha, $user['senha'])) {
            $stmt = $pdo->prepare("UPDATE usuarios SET tentativas = 0, bloqueio_expira = NULL WHERE id = ?");
            $stmt->execute([$user['id']]);
            $_SESSION['usuario'] = $usuario;
            header('Location: dashboard.php');
            exit;
        } elseif (empty($erro)) {
            $tentativas = $user['tentativas'] + 1;
            $bloqueioExpira = null;

            if ($tentativas >= MAX_TENTATIVAS) {
                $bloqueio = new DateTime();
                $bloqueio->modify("+" . BLOQUEIO_MINUTOS . " minutes");
                $bloqueioExpira = $bloqueio->format('Y-m-d H:i:s');
                $erro = "Você excedeu o número máximo de tentativas. Conta bloqueada por " . BLOQUEIO_MINUTOS . " minutos.";
            } else {
                $erro = "Usuário ou senha incorretos. Tentativas restantes: " . (MAX_TENTATIVAS - $tentativas);
            }

            $stmt = $pdo->prepare("UPDATE usuarios SET tentativas = ?, bloqueio_expira = ? WHERE id = ?");
            $stmt->execute([$tentativas, $bloqueioExpira, $user['id']]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    html, body {  
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: white;
      display: flex;
      flex-direction: column;
       border-color: #38b77a;
    }

    main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 0px;
      padding-bottom: 80px;
      border-color: #38b77a;
    }

    .login-container {
      background: #ffffff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 420px;
    border-color: #38b77a;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: black;
      font-weight: 600;
    }

    label {
      font-weight: 600;
      margin-bottom: 5px;
      display: block;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
      margin-bottom: 20px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #2ecc71;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #27ae60;
    }

    .error {
      background-color: #ffdddd;
      color: #d8000c;
      border: 1px solid #d8000c;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 8px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<main>
  <div class="login-container">
    <h2 class="bi bi-box-arrow-in-down"> FAÇA SEU LOGIN</h2>

    <?php if (!empty($erro)): ?>
      <div class="error"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form method="POST" action="painel_funcionario.php">
      <label for="usuario">Usuário</label>
      <input type="text" name="usuario" id="usuario" required>

      <label for="senha">Senha</label>
      <input type="password" name="senha" id="senha" required>

      <button type="submit">Entrar</button>
    </form>
  </div>
</main>

</body>
</html>
