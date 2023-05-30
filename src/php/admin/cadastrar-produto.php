<!-- Editar -->

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
    <link rel="stylesheet" href="../../css/home-admin.css">
    <link rel="stylesheet" href="../../css/logout.css">
    <link rel="stylesheet" href="../../css/editar-produto.css">

    <!-- Script para ações na página -->
    <script defer src="../../js/home.js"></script>
    <script defer src="../../js/edit-account.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="">Editar Usuários</a>
            <a href="">Editar Produtos</a>
            <a href="#">Cadastrar Produto</a>
            <a href="./home-admin.php">Voltar</a>
            <button class="btnlogout-popup">Logout</button>
        </nav>
    </header>

    <!-- popup de logout do usuário -->
    <div class="form-box">
        <form action="">
            <div class="logout-popup">
                <div class="popup">
                    <h2>Logout</h2>
                    <hr>
                    <span class="text-logout">Tem certeza de que deseja encerrar sua sessão?</span>
                    <hr>
                    <div class="botoes">
                        <button class="btnOK">OK</button>
                        <button class="btnFechar">Fechar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <main>
        <div class="formulario-edicao">
        
            <!-- Div de Cadastro de Novo Produto -->
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
                        <span class="icones"><img class="senha-icone" src="../../images/pricetag.svg"></span>
                        <input type="number" name="preco" class="senha" step="0.01" required>
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