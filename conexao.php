<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "escola_db";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$nome_completo = 'nome_completo';
?>
