<?php
include 'header.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title>Painel do Funcionário</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #eafaf1;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .content {
      max-width: 600px;
      margin: 60px auto 40px auto;
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      text-align: center;
    }

    h2 {
      color: #27ae60;
      margin-bottom: 20px;
    }

    p {
      margin: 18px 0;
    }

    a {
      display: inline-block;
      background: #2ecc71;
      color: white;
      padding: 12px 28px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.3s ease;
      box-shadow: 0 3px 8px rgba(46,204,113,0.4);
    }

    a:hover {
      background: #27ae60;
      box-shadow: 0 5px 12px rgba(39,174,96,0.6);
    }

    @media (max-width: 480px) {
      .content {
        margin: 40px 20px;
        padding: 25px;
      }

      a {
        padding: 12px 18px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="content">
    <h2>Bem-vindo!</h2>
    <p class="btn-green"><a href="form_pessoais.php">Matricular Aluno</a></p>
    <p class="btn-green"><a href="listar_matriculas.php">Listar Matrículas</a></p>
    <p class="btn-green"><a href="log_out.php">Sair</a></p>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
