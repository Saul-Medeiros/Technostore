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
    <link rel="stylesheet" href="../../css/editar-produto.css">

    <script defer src="../../js/logout.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="./listar-usuarios.php">Editar Usuários</a>
            <a href="./listar-produtos.php">Editar Produtos</a>
            <a href="#">Cadastrar Produto</a>
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
        <div class="formulario-edicao">
            <div class="form-box produto">
                <h2>Cadastrar Produto</h2>
                <form action="../redirects/cadastrar-produto-redirect.php" method="POST">
                    <div class="input-box">
                        <span class="icones"><img src="../../images/hardware-chip.svg" alt=""></span>
                        <input type="text" name="nome" required>
                        <label>Nome do Produto</label>
                    </div>
                    <div class="input-box">
                        <span class="icones"><img src="../../images/document-text.svg" alt=""></span>
                        <input type="text" name="descricao" required>
                        <label>Descrição</label>
                    </div>
                    <div class="input-box">
                        <span class="icones"><img src="../../images/pricetag.svg"></span>
                        <input type="number" name="preco" step="0.01" required>
                        <label>Preço</label>
                    </div>
                    <div>
                        <button type="submit" class="btn">Cadastrar</button>
                    </div>
                </form>
                <a href="./home-admin.php">
                    <button class="btn voltar">Voltar</button>
                </a>
            </div>
        </div>
    </main>
</body>
</html>