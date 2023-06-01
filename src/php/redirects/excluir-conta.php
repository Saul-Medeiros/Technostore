<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    include('../connect-mysql.php');

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