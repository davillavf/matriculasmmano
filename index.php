<?php
session_start(); // Start session at the very top [[4]]
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de matrículas</title>
    <link rel="stylesheet" href="styles.css"> <!-- External stylesheet [[1]] -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

    <aside class="sidebar">
        <img src="logo.png" alt="Logo MMATRÍCULAS" class="logo">
    </aside>

    <main class="content">
        <h2 class="welcome-text">BEM VINDO(A)!</h2>
        
        <nav class="main-nav">
            <ul>
                <li><a href="login.php"><button class="btn-green"><span>LOGIN </span></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
</svg></button></li>
                <li><a href="sobre.php"><button class="btn-green"><span>SOBRE O SISTEMA </span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
</svg></button></li>
            </ul>
        </nav>
    </main>
</body>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    min-height: 100vh;
    font-family: Arial, sans-serif;
    background-color: #fff;
}

.sidebar {
    width: 300px;
    background: #2ecc71;
    color: white;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.logo {
    width: 350px;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 2rem;
}

.welcome-text {
    color: black;
    font-size: 2rem;
    margin-bottom: 3rem;
}

/* Buttons */
.btn-green {
    background: #2ecc71;
    color: black; /* Black text as requested [[8]] */
    padding: 1rem 2rem;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-green img {
    width: 24px;
    margin-left: 10px;
    opacity: 1; /* Ensure icons are fully visible with black text */
}

.main-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex; /* Use flex for alignment [[3]][[4]] */
    flex-direction: column;
    align-items: center; /* Center buttons vertically */
    gap: 1rem; /* Add spacing between buttons */
}

/* Responsive Design */
@media (max-width: 768px) {
    .main-nav ul {
        justify-content: space-around; /* Distribute buttons evenly [[6]] */
    }

    .footer {
    background-color: #2ecc71;
    color: white;
    text-align: center;
    padding: 1.5rem;
    margin-top: 2rem;
    font-size: 0.95rem;
}

.footer a {
    color: white;
    text-decoration: underline;
}

    
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</html>