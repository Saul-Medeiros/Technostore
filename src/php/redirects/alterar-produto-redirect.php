<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    include('../connect-mysql.php');

    $antigo_nome = $_POST['antigo_nome'];

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql_code = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco' WHERE nome='$antigo_nome'";
    mysqli_query($conexao, $sql_code);
    echo "
    <script>
        alert('Produto alterado com sucesso!');
        location.assign('../admin/listar-produtos.php');
    </script>";
    mysqli_close($conexao);
    ?>
</body>
</html>