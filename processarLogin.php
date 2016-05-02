<?php
require("conectar.php");

//Recebe os dados do formulário
$login = $_POST["username"];
$senha = $_POST["password"];
$senha = md5($senha);
//Busca do banco usuário e senha iguais aos do login
$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' AND
                                    senha='$password' ");
if ($resultado == false) {
    $erro = mysqli_errno($conexao);
    header("location:erro.php?erro=$erro");
} else {
    //Se encontrar o usuário e a senha corretos mostra bem-vindo
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if($quantidadeDeLinhas == 1){
		header("location:home.php");
        //echo("bem-vindo $login");
    }else{
        		header("location:index.php");
    }
}
?>
