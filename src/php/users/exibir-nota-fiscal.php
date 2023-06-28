<?php 
$conexao = mysqli_connect("127.0.0.1", "root", "", "technostore");
if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}

session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../../index.php');
}

date_default_timezone_set("America/Sao_Paulo");
$data = date('Y-m-d');
$hora = date('H:i:s');

$usuario_email = $_SESSION['usuario_email'];

$data_emissao = "$data $hora";
$total = $_POST['valor_total'];
$usuario_id = mysqli_fetch_array(mysqli_query($conexao, "SELECT id FROM usuarios WHERE email='$usuario_email'"))['id'];

$sql_code = "SELECT * FROM notafiscal WHERE usuarios_id='$usuario_id'";
mysqli_query($conexao, "INSERT INTO notafiscal(data_emissao, valor_total, usuarios_id) VALUES('$data_emissao','$total','$usuario_id')");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../../images/logo-white.png" type="image/x-icon">
    
    <title>TechnoStore</title>
    
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/nota-fiscal.css">
</head>
<body>
    <header>
        <h2>TechnoStore<img class="logo" src="../../images/logo-white.png"></h2>
        <nav class="navegacao">
            <a href="./carrinho.php">Voltar</a>
        </nav>
    </header>

    <main style="align-items: initial;">
        <div class="nota-fiscal">
            <h1>Nota Fiscal</h1>
            <p>
                <?php
                    $current_timestamp = date('d-m-Y');
                    echo "Emitido em $hora $current_timestamp";
                ?>
            </p>
            <hr>
            <span class="titulo">
                <h2 style="border-right: 2px solid black; padding-right: 8px;">QTD</h2>
                <h2 style="position: absolute; left: 175px;">Produto</h2>
                <h2 style="position: absolute; right: 105px; border-left: 2px solid black; padding-left: 6px;">Valor</h2>
            </span>
            <hr>
            <div class="conteudo">
                <table class="itens">
                    <?php
                        $query_carrinho = mysqli_query($conexao, "SELECT p.id, p.nome, p.preco FROM carrinho c INNER JOIN produtos p ON p.id = c.produtos_id WHERE usuarios_id='$usuario_id'");
                        
                        $produtos = array();

                        while ($row=mysqli_fetch_array($query_carrinho)) {
                            if (in_array($row['nome'], $produtos)) {
                                continue;
                            } else {
                                $produtos[] = $row['nome'];
                            }
                            
                            $id_produto = $row['id'];
                            
                            $qtd_produto = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM carrinho WHERE usuarios_id='$usuario_id' AND produtos_id='$id_produto'"));
                    ?>

                    <tr>
                        <td style="width: 65px;"><?php echo "$qtd_produto x"; ?></td>
                        <td style="width: 360px;"><?php echo $row['nome']; ?></td>
                        <td style="max-width: 130px;">R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></td>
                    </tr>
                
                    <?php } mysqli_close($conexao); ?>    
                </table>
            </div>
            <hr style="position: absolute; bottom: 40px; width: 97%;">
            <span class="valor-total">
                <h3>Total:</h3>
                <p>R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
            </span>
        </div>
    </main>
</body>
</html>