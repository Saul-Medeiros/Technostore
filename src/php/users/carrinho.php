<?php
include('../connect-mysql.php');

session_start();
// usuário não iniciou sessão
if (!isset($_SESSION['usuario_email'])) {
    // redireciona a página de login
    header('Location: ../../index.php');
}

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
            <a href="./sobre.php">Sobre</a>
            <a href="#">Carrinho</a>
            <a href="./editar-conta.php">Editar Conta</a>
            <a href="./home.php">Voltar</a>
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

        <?php
        $total = 0;
        while($row=mysqli_fetch_array($query)) {
        ?>
        <div class="carrinho">
            <div class="produto">
                <img src="../../images/image-outline.svg" alt="image-icon">
                
                <?php
                // inner join requires here
                $id_carrinho = $row['id'];

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
            
            <form action="../redirects/remover-do-carrinho.php" method="POST">
                <input type="hidden" name="id_carrinho" value="<?php echo $id_carrinho; ?>">
                <button class="remover" type="submit">Remover</button>
            </form>
        </div>
        <?php } ?>


        <!-- alterar para consulta de nota fiscal -->
        <div class="total">
            <p>Total:</p>
            <p>R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
            <form action="./exibir-nota-fiscal.php" method="POST">
                <input type="hidden" name="valor_total" value="<?php echo number_format($total, 2, ',', '.'); ?>">
                <button type="submit">Ver Nota Fiscal</button>
            </form>
        </div>    
    </main>
    
</body>
</html>