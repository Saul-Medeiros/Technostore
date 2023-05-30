<!-- Lembrar de aadicionar as alterações da tabela notafiscal aqui -->
<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    session_start();
    include('../connect-mysql.php');
    
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if (mysqli_connect_errno()) {
        echo "
        <script>
            alert('Não foi possível realizar a compra. Falha de Conexão com MySQL');
            location.assign('../users/home.php');
        </script>";
    } else {
        $usuario_email = $_SESSION['usuario_email'];

        $id_usuario = mysqli_fetch_row(mysqli_query($conexao, "SELECT id FROM usuarios WHERE email='$usuario_email'"))[0];
        $id_produto = mysqli_fetch_row(mysqli_query($conexao, "SELECT id FROM produtos WHERE nome='$nome' AND descricao='$descricao'"))[0];

        $sql_code_carrinho = "INSERT INTO carrinho(usuarios_id, produtos_id, quantidade) VALUES('$id_usuario','$id_produto',1)";
        $sql_query = mysqli_query($conexao, $sql_code_carrinho);

        echo "
        <script>
            alert('Compra Realizada com Sucesso!');
            location.assign('../users/home.php')
        </script>";
    }
    mysqli_close($conexao);
    ?>
</body>
</html>