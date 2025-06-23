<?php
include 'header.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['dados_socioeconomicos'] = $_POST;
    header('Location: form_saude.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Formulário - Socioeconômico</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap opcional para responsividade -->
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
  <form method="post">
    <br>
    <br>
    <br>
    <div class="form-wrapper">
      <h2>Questionário Socioeconômico</h2>

      <label>Com quem mora atualmente?
        <select name="mora_com" required>
          <?php
          $options = ['pai'=>'Pai', 'mae'=>'Mãe', 'ambos'=>'Ambos', 'avos'=>'Avós', 'outros'=>'Outros'];
          $sel = $_SESSION['dados_socioeconomicos']['mora_com'] ?? '';
          foreach ($options as $val => $desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Quantas pessoas moram na casa?
        <input type="number" name="qtd_moradores" required value="<?= htmlspecialchars($_SESSION['dados_socioeconomicos']['qtd_moradores'] ?? '') ?>" />
      </label>

      <label>Número de irmãos:
        <input type="number" name="irmaos" required value="<?= htmlspecialchars($_SESSION['dados_socioeconomicos']['irmaos'] ?? '') ?>" />
      </label>

      <label>Principal fonte de renda familiar:
        <input type="text" name="renda_fonte" required value="<?= htmlspecialchars($_SESSION['dados_socioeconomicos']['renda_fonte'] ?? '') ?>" />
      </label>

      <label>Renda familiar bruta mensal:
        <input type="text" name="renda_bruta" required value="<?= htmlspecialchars($_SESSION['dados_socioeconomicos']['renda_bruta'] ?? '') ?>" />
      </label>

      <label>Tipo de moradia:
        <select name="moradia" required>
          <?php
          $moradias = ['propria'=>'Própria', 'alugada'=>'Alugada', 'cedida'=>'Cedida', 'financiada'=>'Financiada'];
          $sel = $_SESSION['dados_socioeconomicos']['moradia'] ?? '';
          foreach ($moradias as $val => $desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Recebe algum benefício do governo?
        <select name="beneficio" required>
          <?php
          $beneficios = ['nao'=>'Não', 'bolsa_familia'=>'Bolsa Família', 'bpc'=>'BPC', 'outros'=>'Outros'];
          $sel = $_SESSION['dados_socioeconomicos']['beneficio'] ?? '';
          foreach ($beneficios as $val => $desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Responsável trabalha?
        <select name="responsavel_trabalha" required>
          <?php
          $simNao = ['sim'=>'Sim', 'nao'=>'Não'];
          $sel = $_SESSION['dados_socioeconomicos']['responsavel_trabalha'] ?? '';
          foreach ($simNao as $val => $desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Possui computador ou notebook em casa?
        <select name="tem_computador" required>
          <?php
          $sel = $_SESSION['dados_socioeconomicos']['tem_computador'] ?? '';
          foreach ($simNao as $val => $desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Possui acesso à internet?
        <select name="tem_internet" required>
          <?php
          $sel = $_SESSION['dados_socioeconomicos']['tem_internet'] ?? '';
          foreach ($simNao as $val => $desc) {
              $selected = $val === $sel ? 'selected' : '';
              echo "<option value=\"$val\" $selected>$desc</option>";
          }
          ?>
        </select>
      </label>

      <label>Estuda com ajuda de alguém? Quem?
        <input type="text" name="ajuda_estudo" value="<?= htmlspecialchars($_SESSION['dados_socioeconomicos']['ajuda_estudo'] ?? '') ?>" />
      </label>

      <div class="btn-group">
        <button type="button" onclick="window.location.href='form_pessoais.php'">Voltar</button>
        <button type="submit">Próximo</button>
      </div>
    </div>
  </form>
  <?php include 'footer.php'; ?>
</body>
</html>
