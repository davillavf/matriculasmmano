<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Sobre o Sistema - MMatrículas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #38b77a, #6de192);
      color: #222;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .section {
      background: white;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    h1, h2 {
      color: #2ecc71;
      font-weight: bold;
    }

    .icon {
      color: #2ecc71;
      margin-right: 10px;
    }

    footer {
      margin-top: auto;
    }

    .btn-voltar {
      background-color: #2ecc71;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 6px;
      text-decoration: none;
      transition: background 0.3s;
    }

    .btn-voltar:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="section">
      <h1 class="text-center mb-4"><i class="bi bi-info-circle icon"></i>Sobre o MMatrículas</h1>
      <p>O <strong>MMatrículas</strong> é o sistema oficial da <strong>EEEP Manoel Mano</strong> para facilitar, organizar e digitalizar o processo de matrícula escolar. Ele foi desenvolvido para garantir praticidade e segurança no cadastro de alunos.</p>
    </div>

    <div class="section">
      <h2><i class="bi bi-gear icon"></i>Como Utilizar</h2>
      <ul>
        <li><strong>1.</strong> Acesse a área de login com o usuário da coordenação.</li>
        <li><strong>2.</strong> Preencha os formulários divididos em três etapas:
          <ul>
            <li>Dados Pessoais</li>
            <li>Informações Socioeconômicas</li>
            <li>Informações de Saúde</li>
          </ul>
        </li>
        <li><strong>3.</strong> Ao final, o sistema gera um PDF com os dados cadastrados.</li>
        <li><strong>4.</strong> É possível revisar e corrigir os dados antes de finalizar.</li>
      </ul>
    </div>

    <div class="section">
      <h2><i class="bi bi-lock icon"></i>Quem Pode Acessar?</h2>
      <p>O sistema é <strong>restrito à coordenação escolar</strong>. Alunos e responsáveis não têm acesso direto à plataforma. O controle é feito por meio de login seguro com bloqueio após tentativas incorretas.</p>
    </div>

    <div class="section">
      <h2><i class="bi bi-question-circle icon"></i>Suporte</h2>
      <p>Se encontrar qualquer dificuldade ou erro, entre em contato com a equipe técnica da escola pelo e-mail: <strong>suporte@eeepmanoelmano.edu.br</strong> ou procure diretamente a coordenação.</p>
    </div>

    <div class="text-center">
      <a href="index.php" class="btn-voltar"><i class="bi bi-arrow-left-circle"></i> Voltar</a>
    </div>
  </div>

<?php include 'footer.php'; ?>
</body>
</html>
