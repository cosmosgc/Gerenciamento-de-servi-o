<?php 

//Abrir a conexão com o banco
$conexao = mysqli_connect("servidor", "usuario", "senha", "database");
if ($conexao == false) {
    $erro = mysqli_connect_error();
    header("location:erro.php?erro=$erro");
}
?>
