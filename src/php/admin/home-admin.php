<?php 
session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../../index.php');
} else if (!($_SESSION['usuario_email'] == "admin")) {
    header('Location: ../users/home.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../../images/logo-white.png" type="image/x-icon">

    <title>TechnoStore</title>
    
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/home-admin.css">
    <link rel="stylesheet" href="../../css/logout.css">

    <script defer src="../../js/logout.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="#">Home</a>
            <a href="./listar-usuarios.php">Editar Usuários</a>
            <a href="./listar-produtos.php">Editar Produtos</a>
            <a href="./cadastrar-produto.php">Cadastrar Produto</a>
            <button class="btnlogout-popup">Logout</button>
        </nav>
    </header>

    <div class="logout-popup">
        <div class="popup">
            <h2>Logout</h2>
            <hr>
            <span class="text-logout">Tem certeza de que deseja encerrar sua sessão?</span>
            <hr>
            <div class="botoes">
                <a href="../redirects/logout.php">
                    <button class="btnOK">OK</button>
                </a>
                <button class="btnFechar">Fechar</button>
            </div>
        </div>
    </div>
    
    <main>
        <h1 class="background-logo">TechnoStore<img class="logo" src="../../images/logo-black.png"></h1>
    </main>
</body>
</html>