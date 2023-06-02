<!-- Editar -->

<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    include('../connect-mysql.php');
 
    $id_carrinho= $_POST['id_carrinho'];

    $query = "DELETE FROM carrinho WHERE id='$id_carrinho'";

    mysqli_query($conexao, $query);
    mysqli_close($conexao);

    echo "
    <script>
        alert('Compra Excluida com Sucesso!');
        location.assign('../users/carrinho.php')
    </script>";
    ?>
</body>
</html>