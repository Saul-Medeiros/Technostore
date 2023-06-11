<!DOCTYPE html>
<html>
<head>
    <title>Redirect</title>
</head>
<body>
    <?php
    session_start(); // inicia a sessão na página
    session_unset(); // limpa a sessão
    session_destroy(); // destroi a sessão
    header("Location: ../../index.php"); // redireciona a página principal
    ?>
</body>
</html>