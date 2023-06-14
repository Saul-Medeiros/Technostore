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
 
    $id_carrinho= $_POST['id_carrinho'];
    $query = "DELETE FROM carrinho WHERE id='$id_carrinho'";
    mysqli_query($conexao, $query);
    
    echo "
    <script>
        alert('Compra Excluida com Sucesso!');
        location.assign('../users/carrinho.php')
    </script>";

    mysqli_close($conexao);
    ?>
</body>
</html>