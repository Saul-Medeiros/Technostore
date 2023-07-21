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

$user = $_POST['user_mail'];
$row = mysqli_fetch_array(mysqli_query($conexao, "SELECT * FROM usuarios WHERE email='$user'"));
$nome = $row['nome'];
$senha = $row['senha'];
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
    <link rel="stylesheet" href="../../css/editar-conta.css">

    <script defer src="../../js/logout.js"></script>
    <script defer src="../../js/edit-account.js"></script>
</head>
<body>
    <header>
        <h2>Administrador</h2>
        <nav class="navegacao">
            <a href="#">Editar Usuários</a>
            <a href="./listar-produtos.php">Editar Produtos</a>
            <a href="./cadastrar-produto.php">Cadastrar Produto</a>
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
                    <button class="btnOK">OK</button>
                </a>
                <button class="btnFechar">Fechar</button>
            </div>
        </div>
    </div>

    <main>
        <div class="formulario-edicao">
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
                    <input type="hidden" name="user" value="<?php echo $row['email']; ?>">
                    <button type="submit" class="btn">Alterar</button>
                </form>
                <a href="./listar-usuarios.php">
                    <button class="btn voltar">Voltar</button>
                </a>
            </div>
        </div>
    </main>
</body>
</html>