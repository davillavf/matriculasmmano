<?php
include 'header.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['dados_pessoais'] = $_POST;
    header('Location: form_socioeconomico.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Formulário - Dados Pessoais</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap opcional para responsividade -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    button {
      background-color: #2ecc71;
      border: none;
      color: white;
      padding: 14px 24px;
      border-radius: 10px;
      font-size: 16px;
      margin-top: 30px;
      cursor: pointer;
      width: 100%;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #27ae60;
    }

    @media (max-width: 600px) {
      .form-wrapper {
        padding: 25px 20px;
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
      <h2>Dados Pessoais</h2>

      <label>Nome completo:
        <input type="text" name="nome" required value="<?= htmlspecialchars($_SESSION['dados_pessoais']['nome'] ?? '') ?>" />
      </label>

      <label>Nome social:
        <input type="text" name="nome_social" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['nome_social'] ?? '') ?>" />
      </label>

      <label>Data de nascimento:
        <input type="date" name="data_nascimento" required value="<?= htmlspecialchars($_SESSION['dados_pessoais']['data_nascimento'] ?? '') ?>" />
      </label>

      <label>CPF:
        <input type="text" name="cpf" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['cpf'] ?? '') ?>" />
      </label>

      <label>RG:
        <input type="text" name="rg" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['rg'] ?? '') ?>" />
      </label>

      <label>Órgão emissor:
        <input type="text" name="orgao_emissor" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['orgao_emissor'] ?? '') ?>" />
      </label>

      <label>Nacionalidade:
        <input type="text" name="nacionalidade" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['nacionalidade'] ?? '') ?>" />
      </label>

      <label>Naturalidade:
        <input type="text" name="naturalidade" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['naturalidade'] ?? '') ?>" />
      </label>

      <label>Nome da mãe:
        <input type="text" name="mae" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['mae'] ?? '') ?>" />
      </label>

      <label>Nome do pai:
        <input type="text" name="pai" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['pai'] ?? '') ?>" />
      </label>

      <label>Endereço completo:
        <input type="text" name="endereco" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['endereco'] ?? '') ?>" />
      </label>

      <label>Bairro:
        <input type="text" name="bairro" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['bairro'] ?? '') ?>" />
      </label>

      <label>Cidade:
        <input type="text" name="cidade" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['cidade'] ?? '') ?>" />
      </label>

      <label>CEP:
        <input type="text" name="cep" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['cep'] ?? '') ?>" />
      </label>

      <label>Telefone:
        <input type="text" name="telefone" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['telefone'] ?? '') ?>" />
      </label>

      <label>E-mail:
        <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['email'] ?? '') ?>" />
      </label>

      <label>Escola de origem:
        <input type="text" name="escola_origem" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['escola_origem'] ?? '') ?>" />
      </label>

      <label>Ano de conclusão do ensino fundamental:
        <input type="text" name="ano_conclusao" value="<?= htmlspecialchars($_SESSION['dados_pessoais']['ano_conclusao'] ?? '') ?>" />
      </label>

      <button type="submit">Próximo</button>
    </div>
  </form>

  <?php include 'footer.php'; ?>
</body>
</html>
