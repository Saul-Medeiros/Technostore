<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php 
    include('../connect-mysql.php');

    $nome = $_POST['nome'];
    $sql_code = "DELETE FROM produtos WHERE nome='$nome'";
    mysqli_query($conexao, $sql_code);
    echo "
    <script>
        alert('Produto Removido com Sucesso!');
        location.assign('../admin/listar-produtos.php');
    </script>";
    mysqli_close($conexao);
    ?>
</body>
</html>