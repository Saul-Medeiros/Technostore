<?php
session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../index.php');
} else if (!($_SESSION['usuario_email'] == "admin")) {
    header('Location: ../users/home.php');
}

$conexao = mysqli_connect("127.0.0.1", "root", "", "technostore");
if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}

$sql_code = "SELECT * FROM usuarios WHERE id > 1";
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
    <link rel="stylesheet" href="../../css/listar-usuarios.css">

    <script defer src="../../js/logout.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="#">Editar Usuários</a>
            <a href="./listar-produtos.php">Editar Produtos</a>
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
                    <button type="submit" class="btnOK">OK</button>
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
                    alert('Não há usuários para serem listados!');
                    location.assign('./home-admin.php');
                </script>";
            }
            while ($row=mysqli_fetch_array($query)) { 
        ?>

        <div class="listagem-usuario">
            <div class="usuario">
                <img src="../../images/person.svg">
                <span>
                    <p>Usuário: <?php echo $row['nome']; ?></p>
                    <p>Email: <?php echo $row['email']; ?></p>
                </span>
            </div>
            <form action="./alterar-conta-usuario.php" method="POST">
                <input type="hidden" name="user_mail" value="<?php echo $row['email']; ?>">
                <button class="alterar">Alterar</button>
            </form>
            <form action="../redirects/excluir-conta-usuario.php" method="POST">
                <input type="hidden" name="user_mail" value="<?php echo $row['email']; ?>">
                <button class="remover">Excluir Conta</button>
            </form>
        </div>

        <?php } mysqli_close($conexao); ?>
    </main>
</body>
</html>