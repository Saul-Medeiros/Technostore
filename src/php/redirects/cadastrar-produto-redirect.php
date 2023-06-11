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
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $sql_code = "INSERT INTO produtos(nome, descricao, preco) VALUES('$nome', '$descricao', '$preco')";

    if (mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM produtos WHERE nome='$nome'")) > 0) {
        echo "
        <script>
            alert('Produto já possui registro no Banco de Dados.');
            location.assign('../admin/cadastrar-produto.php');
        </script>";
    } else {
        mysqli_query($conexao, $sql_code);
        echo "
        <script>
            alert('Produto Cadastrado com Sucesso!');
            location.assign('../admin/cadastrar-produto.php')
        </script>";
    }
    mysqli_close($conexao);
    ?>
</body>
</html>