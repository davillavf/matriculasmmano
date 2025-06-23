<?php
include 'header.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['dados_saude'] = $_POST;
    header('Location: processar.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Formulário - Saúde</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap para responsividade opcional -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #38b77a;
      margin: 0;
      padding: 40px 20px;
    }

    .form-wrapper {
      max-width: 850px;
      background: #ffffff;
      margin: auto;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      border-top: 8px solid #2ecc71;
    }

    h2 {
      color: #2ecc71;
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
    }

    label {
      font-weight: 600;
      color: #2c3e50;
      margin-top: 15px;
      display: block;
    }

    input, select {
      width: 100%;
      padding: 12px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
      transition: border-color 0.3s ease-in-out;
    }

    input:focus, select:focus {
      border-color: #2ecc71;
      outline: none;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      gap: 15px;
      margin-top: 30px;
    }

    .btn-group button {
      flex: 1;
      background-color: #2ecc71;
      border: none;
      color: white;
      padding: 14px;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-group button:hover {
      background-color: #27ae60;
    }

    @media (max-width: 600px) {
      .form-wrapper {
        padding: 25px 20px;
      }

      .btn-group {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <form method="post" action="form_saude.php">
    <br>
    <br>
    <br>

    <div class="form-wrapper">
      <h2>Questionário de Saúde</h2>

      <label>Possui alguma deficiência? Qual?
        <input type="text" name="deficiencia" value="<?= htmlspecialchars($_SESSION['dados_saude']['deficiencia'] ?? '') ?>" />
      </label>

      <label>Faz uso contínuo de medicamentos? Quais?
        <input type="text" name="medicamentos" value="<?= htmlspecialchars($_SESSION['dados_saude']['medicamentos'] ?? '') ?>" />
      </label>

      <label>Possui alguma alergia? Quais?
        <input type="text" name="alergias" value="<?= htmlspecialchars($_SESSION['dados_saude']['alergias'] ?? '') ?>" />
      </label>

      <label>Já realizou alguma cirurgia? Qual?
        <input type="text" name="cirurgias" value="<?= htmlspecialchars($_SESSION['dados_saude']['cirurgias'] ?? '') ?>" />
      </label>

      <label>Está em tratamento médico? Qual?
        <input type="text" name="tratamento" value="<?= htmlspecialchars($_SESSION['dados_saude']['tratamento'] ?? '') ?>" />
      </label>

      <label>Possui laudos médicos?
        <select name="laudos" required>
          <?php
          $simNao = ['sim'=>'Sim', 'nao'=>'Não'];
          $sel = $_SESSION['dados_saude']['laudos'] ?? '';
          foreach ($simNao as $val=>$desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Autorização para atendimento de urgência?
        <select name="atendimento_urgencia" required>
          <?php
          $sel = $_SESSION['dados_saude']['atendimento_urgencia'] ?? '';
          foreach ($simNao as $val=>$desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Autorização para uso de imagem?
        <select name="uso_imagem" required>
          <?php
          $sel = $_SESSION['dados_saude']['uso_imagem'] ?? '';
          foreach ($simNao as $val=>$desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <div class="btn-group">
        <button type="button" onclick="window.location.href='form_socioeconomicos.php'">Voltar</button>
        <button type="submit">Finalizar e Salvar</button>
      </div>
    </div>
  </form>
  <?php include 'footer.php'; ?>
</body>
</html>
