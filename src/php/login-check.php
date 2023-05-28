<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    include('./connect-mysql.php');

    $usuario = $_POST['email'];
    $senha = $_POST['senha'];
    $query_check_user = "SELECT * FROM usuarios WHERE email='$usuario' OR nome='$usuario'";

    if (mysqli_connect_errno()) {
        die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
    } else if (mysqli_num_rows(mysqli_query($conexao, $query_check_user)) == 0) {
        // usuário não registrado
        echo "
        <script>
            alert('Usuário não possui registro em nosso site!');
            location.assign('../index.php');
        </script>";
        mysqli_close($conexao);
    } else {
        // usuário registrado
        $query_check_password = "SELECT * FROM usuarios WHERE email='$usuario' AND senha='$senha' OR nome='$usuario' AND senha='$senha'";
        if (mysqli_num_rows(mysqli_query($conexao, $query_check_password)) == 0) {
            // senha incorreta
            echo "
            <script>
                alert('Senha incorreta!');
                location.assign('../index.php');
            </script>";
        } else {
            // senha coincide com usuário
            $user_admin_check = "SELECT * FROM usuarios WHERE email='admin'";
            $row=mysqli_fetch_row(mysqli_query($conexao, $user_admin_check));
            
            /* Faz a verificação com nome de usuário e email, para caso coincida com usuário admin */
            if ($row[1] == $usuario || $row[2] == $usuario) {
                // usuário admin
                echo "
                <script>
                    location.assign('../home-admin.html');
                </script>";
            } else {
                // usuário comum

                /*
                 * O email do usuário será auto-enviado para a página home.php com o uso de JavaScript.
                 * 
                 * Isso facilitará o registro de outras tabelas e a página conseguirá indentificar o usuário atual, através do seu email.
                 */
                echo "
                <form id=\"form\" action=\"../home.php\" method=\"POST\">
                    <input type=\"hidden\" name=\"usuario\" value=\"$usuario\">
                </form>
                <script>
                    const form = document.getElementById('form');
                    form.submit();
                </script>";
            }
        }
    }
    mysqli_close($conexao);
    ?>
</body>
</html>