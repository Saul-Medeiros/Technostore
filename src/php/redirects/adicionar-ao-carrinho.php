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
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $usuario_email = $_SESSION['usuario_email'];

    $id_usuario = mysqli_fetch_array(mysqli_query($conexao, "SELECT id FROM usuarios WHERE email='$usuario_email'"))['id'];
    $id_produto = mysqli_fetch_array(mysqli_query($conexao, "SELECT id FROM produtos WHERE nome='$nome' AND descricao='$descricao'"))['id'];

    $sql_code_carrinho = "INSERT INTO carrinho(usuarios_id, produtos_id) VALUES('$id_usuario','$id_produto')";
    mysqli_query($conexao, $sql_code_carrinho);
    
    echo "
    <script>
        alert('Compra Realizada com Sucesso!');
        location.assign('../users/home.php');
    </script>";

    mysqli_close($conexao);
    ?>
</body>
</html>