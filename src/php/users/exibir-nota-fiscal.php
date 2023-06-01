<!-- Editar -->

<?php 
include('../connect-mysql.php');

session_start();
// usuário não iniciou sessão
if (!isset($_SESSION['usuario_email'])) {
    // redireciona a página de login
    header('Location: ../../index.php');
}

date_default_timezone_set("America/Sao_Paulo"); 
$data = date('Y-m-d');
$hora = date('H:i:s');
$usuario = $_SESSION['usuario_email'];

$data_emissao = "$data $hora";
$total = $_POST['valor_total'];
$usuario_id = mysqli_fetch_array(mysqli_query($conexao, "SELECT id FROM usuarios WHERE email='$usuario'"))['id'];

$sql_code = "SELECT * FROM nota_fiscal WHERE usuarios_id='$usuario_id'";

// Nota fiscal não registrada na tabela
if (mysqli_num_rows(mysqli_query($conexao, $sql_code)) == 0) {
    mysqli_query($conexao, "INSERT INTO nota_fiscal(data_emissao, valor_total, usuarios_id) VALUES('$data_emissao','$total','$usuario_id')");
// Atualizar registro da nota fiscal
} else {
    mysqli_query($conexao, "UPDATE nota_fiscal SET data_emissao='$data_emissao', valor_total='$total', usuarios_id='$usuario_id'");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- favicon da página -->
    <link rel="shortcut icon" href="../../images/logo-white.png" type="image/x-icon">

    <title>TechnoStore</title>
    
    <!-- Estilização da página -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/sobre.css">

</head>
<body>
    
    <header>
        <h2>TechnoStore<img class="logo" src="../../images/logo-white.png"></h2>
        <nav class="navegacao">
            <a href="./carrinho.php">Voltar</a>
        </nav>
    </header>

    <main>
        <div class="about">
            <!-- fazer uma tabela para melhor organização dos regsitros -->
            <?php ?>
            <p>(qtd)x Nome Produto       valor: R$ valor</p>
            <?php ?>
            <p>Total:</p>
        </div>
    </main>

</body>
</html>