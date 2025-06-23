<?php
session_start();
include("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $usuario_data = mysqli_fetch_assoc($result);
    $_SESSION['usuario'] = $usuario_data['usuario'];
    $_SESSION['nivel'] = $usuario_data['nivel']; // nível de acesso
    header("Location: painel_funcionario.php");
} else {
    echo "<script>alert('Usuário ou senha inválidos'); window.location='login.php';</script>";
}
?>
