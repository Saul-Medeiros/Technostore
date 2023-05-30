<!-- Editar -->

<?php
include('../connect-mysql.php');
if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}

session_start();
$usuario_email = $_SESSION['usuario_email'];

$usuario_id = mysqli_fetch_row(mysqli_query($conexao, "SELECT id FROM usuarios WHERE email='$usuario_email'"))[0];

$sql_code = "SELECT * FROM carrinho WHERE usuarios_id='$usuario_id'"; // consultar a possibilidade de fazer inner join
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
    <link rel="stylesheet" href="../../css/carrinho.css">

    <!-- Script para ações na página -->
    <script defer src="../../js/home.js"></script>
</head>
<body>
    <header>
        <h2>TechnoStore<img class="logo" src="../../images/logo-white.png"></h2>
        <nav class="navegacao">
            <a href="">Sobre</a>
            <a href="#">Carrinho</a>
            <a href="">Editar Conta</a>
            <a href="">Voltar</a>
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

    <!-- php carrinho usuário -->
    <main>

        <?php
        $total = 0;
        while($row=mysqli_fetch_array($query)) {
        ?>
        <div class="carrinho">
            <div class="produto">
                <img src="../../images/image-outline.svg" alt="image-icon">
                
                <?php 
                $id_produto = $row['produtos_id'];
                $query_produto = mysqli_query($conexao, "SELECT * FROM produtos WHERE id='$id_produto'");
                $array_produto = mysqli_fetch_array($query_produto);
                ?>
                
                <p>
                    <?php echo $array_produto['nome']; ?>
                </p>
            </div>
            <div class="preco">
                R$ 
                <?php
                $total += $array_produto['preco'];
                echo number_format($array_produto['preco'], 2, ',', '.');
                ?>
            </div>
            
            <form action="../redirects/remove-from-cart.php" method="POST">
                <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">
                <button class="remover" type="submit">Remover</button>
            </form>
        </div>
        <?php } ?>


        <!-- alterar para consulta de nota fiscal -->
        <div class="total">
            <p>Total:</p>
            <p>R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
            <button>Ver Nota Fiscal</button>
        </div>    
    </main>
    
</body>
</html>