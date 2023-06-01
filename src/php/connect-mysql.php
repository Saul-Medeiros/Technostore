<?php 
$porta = "127.0.0.1";
$user = "root";
$senha = "";
$banco = "technostore";
$conexao = mysqli_connect($porta, $user, $senha, $banco);

if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}
?>