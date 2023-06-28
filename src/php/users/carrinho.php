<?php
$conexao = mysqli_connect("127.0.0.1", "root", "", "technostore");
if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}

session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../index.php');
}

$usuario_email = $_SESSION['usuario_email'];
$usuario_id = mysqli_fetch_array(mysqli_query($conexao, "SELECT id FROM usuarios WHERE email='$usuario_email'"))['id'];

$sql_code = "SELECT c.id, p.nome, p.preco FROM carrinho c INNER JOIN produtos p ON p.id = c.produtos_id WHERE usuarios_id='$usuario_id'";
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
    <link rel="stylesheet" href="../../css/carrinho.css">

    <script defer src="../../js/logout.js"></script>
</head>
<body>
    <header>
        <h2>TechnoStore<img class="logo" src="../../images/logo-white.png"></h2>
        <nav class="navegacao">
            <a href="./sobre.html">Sobre</a>
            <a href="#">Carrinho</a>
            <a href="./editar-conta.php">Editar Conta</a>
            <a href="./home.php">Voltar</a>
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
                    <button type="submit" class="btnOK">OK</button>
                </a>
                <button class="btnFechar">Fechar</button>
            </div>
        </div>
    </div>
    
    <main>
        <?php
            $total = 0;
            while($row=mysqli_fetch_array($query)) {
                $id_carrinho = $row['id'];
                $total += $row['preco'];
        ?>

        <div class="carrinho">
            <div class="produto">
                <img src="../../images/image-outline.svg" alt="image-icon">
                <p><?php echo $row['nome']; ?></p>
            </div>
            <div class="preco">
                R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?>
            </div>
            <form action="../redirects/remover-do-carrinho.php" method="POST">
                <input type="hidden" name="id_carrinho" value="<?php echo $id_carrinho; ?>">
                <button class="remover" type="submit">Remover</button>
            </form>
        </div>

        <?php } mysqli_close($conexao); ?>

        <div class="total">
            <p>Total:</p>
            <p>R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
            <form action="./exibir-nota-fiscal.php" method="POST">
                <input type="hidden" name="valor_total" value="<?php echo $total; ?>">
                <button type="submit">Ver Nota Fiscal</button>
            </form>
        </div>    
    </main>
</body>
</html>