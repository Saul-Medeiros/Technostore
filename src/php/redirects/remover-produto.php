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