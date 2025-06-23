<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>MMatrículas - Header</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f9;
      padding-top: 110px; /* Espaço para o header fixo */
    }

    .header-custom {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100px;
      z-index: 999;
      background: linear-gradient(90deg, rgba(19,126,61,0.95), rgba(58,219,120,0.95));
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 40px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 25px;
    }

    .logo-matriculas {
      height: 120px;
    }

    .logo-escola {
      height: 80px;
    }

    .button-group a {
      border-radius: 25px;
      padding: 8px 24px;
      font-weight: 500;
      font-size: 15px;
      background-color: rgba(255, 255, 255, 0.9);
      color: #137E3D;
      border: none;
      margin-left: 10px;
      transition: all 0.3s ease-in-out;
      text-decoration: none;
    }

    .button-group a:hover {
      background-color: #ffffff;
      color: #0d5f2f;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
      .header-custom {
        flex-direction: column;
        height: auto;
        padding: 20px;
        gap: 10px;
      }

      .logo-container {
        justify-content: center;
        gap: 15px;
      }

      .button-group {
        display: flex;
        justify-content: center;
      }

      .button-group a {
        margin-left: 5px;
        padding: 6px 16px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

  <nav class="header-custom">
    <div class="logo-container">
      <img src="logo1.png" alt="Logo Mmatrículas" class="logo-matriculas">
      <img src="logo_escola.svg" alt="Logo Escola" class="logo-escola">
    </div>
    <div class="button-group">
      <a href="index.php">INÍCIO</a>
      <a href="log_out.php">LOGOUT</a>
    </div>
  </nav>
  <main class="container mt-5">
</body>
</html>
