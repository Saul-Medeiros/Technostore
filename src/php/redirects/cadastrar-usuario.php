<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    include("../connect-mysql.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql_code = "INSERT INTO usuarios(nome, email, senha) VALUES('$nome', '$email', '$senha')";

    if (mysqli_connect_errno()) {
        echo "
        <script>
            alert('Não foi possível registrar usuário. Falha de Conexão com MySQL');
            location.assign('../../index.php');
        </script>";
    } else if (mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM usuarios WHERE email='$email'")) > 0) {
        echo "
        <script>
            alert('Usuário já possui registro em nosso site.');
            location.assign('../../index.php');
        </script>";
    } else {
        mysqli_query($conexao, $sql_code);
        echo "
        <script>
            alert('Usuário Registrado com Sucesso!');
            location.assign('../../index.php');
        </script>";
    }
    mysqli_close($conexao);
    
    ?>
</body>
</html>