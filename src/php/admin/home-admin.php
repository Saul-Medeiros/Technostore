<?php 
session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- favicon da página -->
    <link rel="shortcut icon" href="../../images/logo-white.png" type="image/x-icon">

    <title>TechnoStore</title>
    
    <!-- Estilização da página -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/logout.css">
    <link rel="stylesheet" href="../../css/home-admin.css">

    <!-- Script para ações na página -->
    <script defer src="../../js/home.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="#">Home</a>
            <a href="">Editar Usuários</a>
            <a href="">Editar Produtos</a>
            <a href="./cadastrar-produto.php">Cadastrar Produto</a>
            <button class="btnlogout-popup">Logout</button>
        </nav>
    </header>

    <!-- popup de logout do usuário -->
    <div class="form-box">
        <div class="logout-popup">
            <div class="popup">
                <h2>Logout</h2>
                <hr>
                <span class="text-logout">Tem certeza de que deseja encerrar sua sessão?</span>
                <hr>
                <div class="botoes">
                    <form action="../redirects/logout.php">
                        <button type="submit" class="btnOK">OK</button>
                    </form>
                    
                    <button class="btnFechar">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <main>
        <h1 class="background-logo">TechnoStore<img class="logo" src="./images/logo-black.png"></h1>
    </main>

</body>
</html>