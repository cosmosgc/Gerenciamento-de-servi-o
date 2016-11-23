<?php 

//Abrir a conexão com o banco
$conexao = mysqli_connect("mysql.hostinger.com.br", "u474781536_admin", "34421282", "u474781536_royal");
//$conexao = mysqli_connect("localhost", "root", "", "royalink");
if ($conexao == false) {
    $erro = mysqli_connect_error();
    echo ("conectar erro: $erro");
}
?>
