<?php
$conexao = mysqli_connect("127.0.0.1", "root", "", "technostore");
if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}

session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../index.php');
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
    <link rel="stylesheet" href="../../css/logout.css">

    <script defer src="../../js/logout.js"></script>
</head>
<body>
    <header>
        <h2>TechnoStore<img class="logo" src="../../images/logo-white.png"></h2>
        <nav class="navegacao">
            <a href="#">Home</a>
            <a href="./sobre.html">Sobre</a>
            <a href="./carrinho.php">Carrinho</a>
            <a href="./editar-conta.php">Editar Conta</a>
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
                    <button type="submit" class="btnOK">OK</button>
                </form>
                <button class="btnFechar">Fechar</button>
            </div>
        </div>
    </div>

    <main>
        <?php
            if (mysqli_num_rows($query) == 0) {
                echo "<h1 style=\"
                display: flex;
                color: black;
                flex-direction: row;
                align-items: center;
                font-size: 40pt;\">
                    TechnoStore<img style=\"width: 400px; height: 400px;\" src=\"../../images/logo-black.png\">
                </h1>";
            }
            while($row=mysqli_fetch_array($query)) {
        ?>
        
            <div class="span-php">
                <span class="nome-produto">
                    <?php echo $row['nome']; ?>
                    <img src="../../images/image-outline.svg" alt="<?php echo $row['nome']; ?>">
                </span>
                <hr style="border-color: rgba(255, 255, 255, 0.5); width: 100%; position: absolute; top: 50%;">
                <h3>Descrição:</h3>
                <p><?php echo $row['descricao']; ?></p>
                <div class="rodape-item">
                    <span class="preco">
                        R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?>
                    </span>
                    <form action="../redirects/adicionar-ao-carrinho.php" method="POST">
                        <input type="hidden" name="nome" value="<?php echo $row['nome']; ?>">
                        <input type="hidden" name="descricao" value="<?php echo $row['descricao']; ?>">
                        <input type="hidden" name="preco" value="<?php echo $row['preco']; ?>">
                        <button type="submit" style="position: absolute; right: 0; bottom: 0;">Comprar</button>
                    </form>
                </div>
            </div>

        <?php } mysqli_close($conexao); ?>
    </main>
</body>
</html>