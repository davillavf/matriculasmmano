<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Página com Footer Fixo no Final</title>
  
  <!-- Bootstrap CSS (para os ícones e classes utilitárias) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .main-content {
      flex: 1 0 auto; /* Faz o conteúdo crescer e ocupar o espaço */
      padding: 20px;
      /* Exemplo: centralizar o conteúdo, você pode ajustar */
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f5f5f5;
      /* Altura mínima só pra exemplo */
      min-height: 400px;
    }

    .footer-custom {
      flex-shrink: 0; /* Footer não encolhe */
      background: #38b77a;
      color: white;
      font-size: 15px;
      width: 100%;
    }

    .footer-wrapper {
      width: 100%;
      max-width: 100%;
      padding-left: 40px;
      padding-right: 40px;
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
    }

    @media(min-width: 768px) {
      .footer-wrapper {
        flex-direction: row;
        align-items: center;
      }
    }

    .footer-title {
      font-weight: bold;
      font-size: 18px;
      text-align: center;
    }

    .footer-link {
      color: white;
      text-decoration: none;
      margin: 0 6px;
      font-size: 14px;
      transition: color 0.3s;
    }

    .footer-link:hover {
      color: #e8ffe8;
      text-decoration: underline;
    }

    .footer-icon {
      color: white;
      font-size: 20px;
      margin: 0 8px;
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .footer-icon:hover {
      color: #f4f4f4;
      transform: scale(1.2);
    }

    @media (max-width: 576px) {
      .footer-wrapper {
        padding-left: 20px;
        padding-right: 20px;
      }
    }
  </style>
</head>
<body>
  <footer class="footer-custom mt-5">
    <div class="footer-wrapper py-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
      
      <!-- Coluna Esquerda -->
      <div class="text-center text-md-start mb-3 mb-md-0 px-3">
        <h5 class="footer-title">EEEP Manoel Mano</h5>
        <p class="mb-0">Crateús - Ceará</p>
        <p class="mb-0">Sistema de Matrículas - MMatrículas</p>
      </div>

      <!-- Coluna Centro com Links -->
      <div class="footer-links text-center mb-3 mb-md-0 px-3">
        <a href="#" class="footer-link">Ajuda</a> |
        <a href="#" class="footer-link">Política de Privacidade</a> |
        <a href="#" class="footer-link">Termos</a>
      </div>

      <!-- Coluna Direita com Ícones -->
      <div class="text-center text-md-end px-3">
        <div class="social-icons">
          <a href="https://www.instagram.com/eeepmanoelmano?igsh=d2U3bnh6Ymk0bWxh" title="Instagram" class="footer-icon"><i class="bi bi-instagram"></i></a>
          <a href="https://m.facebook.com/100013314432926/?locale=pt_BR" title="Facebook" class="footer-icon"><i class="bi bi-facebook"></i></a>
          <a href="eeepmmano@escola.ce.gov.br" title="Email" class="footer-icon"><i class="bi bi-envelope-fill"></i></a>
        </div>
        <p class="mb-0 mt-2">&copy; <?php echo date("Y"); ?> Todos os direitos reservados</p>
      </div>

    </div>
  </footer>

</body>
</html>
