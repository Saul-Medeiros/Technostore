<!-- Editar -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- favicon da página -->
    <link rel="shortcut icon" href="./images/logo-white.png" type="image/x-icon">

    <title>TechnoStore</title>
    
    <!-- Estilização da página -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/logout.css">
    <link rel="stylesheet" href="../../css/home-admin.css">
    <link rel="stylesheet" href="../../css/listar-produtos.css">

    <!-- Script para ações na página -->
    <script defer src="../../js/home.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="./home-admin.php">Home</a>
            <a href="">Editar Usuários</a>
            <a href="#">Editar Produtos</a>
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

    <!-- php Produtos -->
    <main>
        
        <div class="produtos">
            <div class="produto">
                <img src="../../images/hardware-chip.svg" alt="">
                <p>Nome nome nome nome nome</p>
            </div>
            <div class="descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus assumenda aliquam omnis facere? Eos eligendi molestiae sit, dolores esse, qui doloribus asperiores ducimus ipsa exercitationem aspernatur, culpa perspiciatis at ex.</div>
            <div class="preco">R$ 10000,00</div>
            <button class="alterar">Alterar</button>
            <button class="remover">Remover</button>
        </div>
        
    </main>

</body>
</html>