<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    $conexao = mysqli_connect("127.0.0.1", "root", "", "technostore");
    if (mysqli_connect_errno()) {
        die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
    }

    session_start();
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // alteração por usuário admin
    if ($_SESSION['usuario_email'] == "admin") {
        $user_change = $_POST['user'];
    // alteração por usuário comum
    } else {
        $user_change = $_SESSION['usuario_email'];
    }

    $sql_code = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE email='$user_change'";
    mysqli_query($conexao, $sql_code);
    
    if ($_SESSION['usuario_email'] == "admin") {
        // mostra uma mensagem de alteração de conta e volta a listagem de usuário
        echo "
        <script>
            alert('Usuário alterado com sucesso!');
            location.assign('../admin/listar-usuarios.php');
        </script>";
    } else {
        // mostra uma mensagem de alteração de conta e faz logout do usuário, o encaminhando pra página principal para fazer login
        echo "
        <script>
            alert('Usuário alterado com sucesso! Faça login novamente.');
            location.assign('./logout.php');
        </script>";
    }

    mysqli_close($conexao);
    ?>
</body>
</html>