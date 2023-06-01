<?php 
session_start();
// usuário não iniciou sessão
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../index.php');
// usuário não é admin
} else if (!($_SESSION['usuario_email'] == "admin")) {
    header('Location: ../users/home.php');
}

include('../connect-mysql.php');

$sql_code = "SELECT * FROM produtos";
$query = mysqli_query($conexao, $sql_code);
?>
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
            <a href="./listar-usuarios.php">Editar Usuários</a>
            <a href="#">Editar Produtos</a>
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
                        <button class="btnOK">OK</button>
                    </form>
                    <button class="btnFechar">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- php Produtos -->
    <main>
        <?php 
        // se não houver produtos cadastrados
        if (mysqli_num_rows($query) == 0) {
            // redireciona a página principal
            echo "
            <script>
                alert('Não há produtos para serem listados!');
                location.assign('./home-admin.php');
            </script>";
        }
        while ($row=mysqli_fetch_array($query)) {
        ?>
        <div class="produtos">
            <div class="produto">
                <img src="../../images/image-outline.svg">
                <p><?php echo $row['nome']; ?></p>
            </div>
            <div class="descricao"><?php echo $row['descricao']; ?></div>
            <div class="preco">R$ <?php echo number_format($row['preco'], 2, ",", "."); ?></div>
            
            <form action="./alterar-produto.php" method="POST">
                <input type="hidden" name="nome" value="<?php echo $row['nome']; ?>">
                <button class="alterar">Alterar</button>
            </form>

            <form action="../redirects/remover-produto.php" method="POST">
                <input type="hidden" name="nome" value="<?php echo $row['nome']; ?>">
                <button class="remover">Remover</button>
            </form>
        </div>
        <?php } mysqli_close($conexao); ?>
    </main>

</body>
</html>