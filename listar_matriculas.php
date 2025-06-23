<?php
include("header.php");
include("conexao.php");

// Consulta SQL
$sql = "SELECT * FROM matriculas"; // Altere se sua tabela tiver outro nome
$result = mysqli_query($conn, $sql);

// Verificação de erro na consulta
if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}
?>

<style>
  .content {
    max-width: 900px;
    margin: 30px auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
  }

  h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #2ecc71;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  thead {
    background: linear-gradient(90deg, #27ae60, #2ecc71);
    color: white;
  }

  thead th {
    padding: 12px 15px;
    text-align: left;
  }

  tbody tr {
    background: #f9f9f9;
    transition: background-color 0.3s ease;
  }

  tbody tr:nth-child(even) {
    background: #e6f2ea;
  }

  tbody tr:hover {
    background-color: #c9f0d5;
    cursor: pointer;
  }

  tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
  }

  @media (max-width: 600px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }

    thead tr {
      display: none;
    }

    tbody tr {
      margin-bottom: 20px;
      background: #f9f9f9;
      border-radius: 8px;
      padding: 15px;
    }

    tbody td {
      padding-left: 50%;
      position: relative;
      text-align: right;
      border-bottom: 1px solid #ddd;
    }

    tbody td::before {
      content: attr(data-label);
      position: absolute;
      left: 15px;
      top: 12px;
      font-weight: bold;
      text-transform: uppercase;
      color: #2ecc71;
      width: 40%;
      text-align: left;
    }
  }
</style>

<div class="content">
    <h2>Alunos Matriculados</h2>
    <table>
        <thead>
          <tr>
              <th>Nome</th>
              <th>CPF</th>
              <th>Data de Nascimento</th>
              <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                  <td data-label="Nome"><?= htmlspecialchars($row['nome']) ?></td>
                  <td data-label="CPF"><?= htmlspecialchars($row['cpf']) ?></td>
                  <td data-label="Data de Nascimento"><?= htmlspecialchars($row['data_nascimento']) ?></td>
                  <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
              </tr>
          <?php } ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>
