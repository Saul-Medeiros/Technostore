<!-- Editar -->

<?php 
session_start();

if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../index.php');
}

include('../connect-mysql.php');

$usuario_email = $_SESSION['usuario_email'];
$sql_code_user = "SELECT * FROM usuarios WHERE email='$usuario_email'";
$row = mysqli_fetch_array(mysqli_query($conexao, $sql_code_user)); // returns 1 rows on mysql

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
    <link rel="stylesheet" href="../../css/editar-conta.css">

    <!-- Script para ações na página -->
    <script defer src="../../js/home.js"></script>
    <script defer src="../../js/edit-account.js"></script>
</head>
<body>
    <header>
        <h2>TechnoStore<img class="logo" src="../../images/logo-white.png"></h2>
        <nav class="navegacao">
            <a href="">Sobre</a>
            <a href="">Carrinho</a>
            <a href="#">Editar Conta</a>
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

    <main>
        <div class="formulario-edicao">
            
        <!-- Div de Alteração do Usuário -->
            <div class="form-box account">
                <h2>Modificar Conta</h2>
                <form action="../redirects/alterar-conta-redirect.php" method="POST">
                    <div class="input-box">
                        <span class="icones"><img src="../../images/person.svg" alt=""></span>
                        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
                        <label>Nome de Usuário</label>
                    </div>
                    <div class="input-box">
                        <span class="icones"><img src="../../images/mail.svg" alt=""></span>
                        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icones"><img class="senha-icone" src="../../images/eye-off-outline.svg"></span>
                        <input type="password" name="senha" class="senha" required>
                        <label>Senha</label>
                    </div>
                    <button type="submit" class="btn">Alterar</button>
                </form>
                <form action="./home.php">
                    <button class="btn voltar">Voltar</button>
                </form>
            </div>
        </div>
    </main>

</body>
</html>