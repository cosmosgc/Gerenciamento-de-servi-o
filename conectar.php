<?php 

//Abrir a conexão com o banco
//$conexao = mysqli_connect("servidor", "usuario", "senha", "database");
$conexao = mysqli_connect("localhost", "root", "", "royalink");
if ($conexao == false) {
    $erro = mysqli_connect_error();
    echo ("conectar erro: $erro");
}
?>
