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

    $usuario_email = $_SESSION['usuario_email'];

    $id_usuario = mysqli_fetch_array(mysqli_query($conexao, "SELECT id FROM usuarios WHERE email='$usuario_email'"))['id'];
    $id_produto = mysqli_fetch_array(mysqli_query($conexao, "SELECT id FROM produtos WHERE nome='$nome' AND descricao='$descricao'"))['id'];

    $sql_code_carrinho = "INSERT INTO carrinho(usuarios_id, produtos_id, quantidade) VALUES('$id_usuario','$id_produto',1)";
    $sql_query = mysqli_query($conexao, $sql_code_carrinho);
    mysqli_close($conexao);

    echo "
    <script>
        alert('Compra Realizada com Sucesso!');
        location.assign('../users/home.php')
    </script>";
    ?>
</body>
</html>