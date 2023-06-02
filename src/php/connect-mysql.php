<?php
$conexao = mysqli_connect("127.0.0.1", "root", "", "technostore");

if (mysqli_connect_errno()) {
    die("Falha de Conexão com o MySQL: " . mysqli_connect_error());
}
?>