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

    $user_mail = $_POST['user_mail'];
    $sql_code = "DELETE FROM usuarios WHERE email='$user_mail'";
    mysqli_query($conexao, $sql_code);
    
    echo "
    <script>
        alert('Usuário deletado com sucesso!');
        location.assign('../admin/listar-usuarios.php');
    </script>";

    mysqli_close($conexao);
    ?>
</body>
</html>