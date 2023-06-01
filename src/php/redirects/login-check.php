<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    include('../connect-mysql.php');

    $usuario_email = $_POST['email'];
    $senha = $_POST['senha'];
    $query_check_user = "SELECT * FROM usuarios WHERE email='$usuario_email'";

    if (mysqli_num_rows(mysqli_query($conexao, $query_check_user)) == 0) {
        // usuário não registrado
        echo "
        <script>
            alert('Usuário não possui registro em nosso site!');
            location.assign('../../index.php');
        </script>";
        mysqli_close($conexao);
    } else {
        // usuário registrado
        $query_check_password = "SELECT * FROM usuarios WHERE email='$usuario_email' AND senha='$senha'";
        if (mysqli_num_rows(mysqli_query($conexao, $query_check_password)) == 0) {
            // senha incorreta
            echo "
            <script>
                alert('Senha incorreta!');
                location.assign('../../index.php');
            </script>";
        } else {
            // senha coincide com usuário
            $user_admin_check = "SELECT * FROM usuarios WHERE email='admin'";
            $row=mysqli_fetch_array(mysqli_query($conexao, $user_admin_check));

            /* Inicia a sessão do usuário com o email informado */
            session_start();
            $_SESSION['usuario_email'] = $usuario_email;

            /* Faz a verificação com email, para caso coincida com usuário admin */
            if ($row['email'] == $usuario_email) {
                // usuário admin
                header('Location: ../admin/home-admin.php');
            } else {
                // usuário comum
                header('Location: ../users/home.php');
            }
        }
    }
    mysqli_close($conexao);
    ?>
</body>
</html>