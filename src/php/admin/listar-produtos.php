<?php 
session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../../index.php');
} else if (!($_SESSION['usuario_email'] == "admin")) {
    header('Location: ../users/home.php');
}

$conexao = mysqli_connect("127.0.0.1", "root", "", "technostore");
if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}

$sql_code = "SELECT * FROM produtos";
$query = mysqli_query($conexao, $sql_code);
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
    <link rel="stylesheet" href="../../css/listar-produtos.css">

    <script defer src="../../js/logout.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="./listar-usuarios.php">Editar Usuários</a>
            <a href="#">Editar Produtos</a>
            <a href="./cadastrar-produto.php">Cadastrar Produto</a>
            <a href="./home-admin.php">Voltar</a>
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
                <form action="../redirects/logout.php">
                    <button class="btnOK">OK</button>
                </form>
                <button class="btnFechar">Fechar</button>
            </div>
        </div>
    </div>
    
    <main>
        <?php 
            if (mysqli_num_rows($query) == 0) {
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