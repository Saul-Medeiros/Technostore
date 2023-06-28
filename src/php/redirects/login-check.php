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

    $usuario_email = $_POST['email'];
    $senha = $_POST['senha'];
    $query_check_user = "SELECT * FROM usuarios WHERE email='$usuario_email'";

    if (mysqli_num_rows(mysqli_query($conexao, $query_check_user)) == 0) {
        echo "
        <script>
            alert('Usuário não possui registro em nosso site!');
            location.assign('../../index.php');
        </script>";
        mysqli_close($conexao);
    } else {
        $query_check_password = "SELECT * FROM usuarios WHERE email='$usuario_email' AND senha='$senha'";
        if (mysqli_num_rows(mysqli_query($conexao, $query_check_password)) == 0) {
            echo "
            <script>
                alert('Senha incorreta!');
                location.assign('../../index.php');
            </script>";
        } else {
            $user_admin_check = "SELECT * FROM usuarios WHERE email='admin'";
            $row=mysqli_fetch_array(mysqli_query($conexao, $user_admin_check));

            session_start();
            $_SESSION['usuario_email'] = $usuario_email;

            if ($row['email'] == $usuario_email) {
                header('Location: ../admin/home-admin.php');
            } else {
                header('Location: ../users/home.php');
            }
        }
    }
    
    mysqli_close($conexao);
    ?>
</body>
</html>