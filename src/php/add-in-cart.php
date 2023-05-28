<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    include('./connect-mysql.php');
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];


    if (mysqli_connect_errno()) {
        echo "
        <script>
            alert('Não foi possível cadastrar o produto. Falha de Conexão com MySQL');
            location.assign('../home.html')
        </script>";
        mysqli_close($conexao);
    } else {
        mysqli_query($conexao, $sql_code);
        echo "
        <script>
            alert('Produto Cadastrado com Sucesso!');
            location.assign('../home.html')
        </script>";
        mysqli_close($conexao);
    }
    ?>
</body>
</html>