<?php
///////////DATABASE!\\\\\\\\\\\
require("conectar.php");
//Recebe os dados do formulário
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
//Busca do banco usuário e senha iguais aos do login
$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' AND senha='$password' OR cnpj='$username' AND senha='$password'");
if ($resultado == false) {
    $erro = mysqli_errno($conexao);
    echo("location:erro.php?erro=$erro");
} else {
    //Se encontrar o usuário e a senha corretos mostra bem-vindo
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if($quantidadeDeLinhas == 1){
        //echo("bem-vindo $username");
        

        session_start();
		//$username=$_SESSION['username'];
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
        header('Location:home.php');


    }else{
        $resultado = mysqli_query($conexao, "SELECT * FROM funcionario
                                    WHERE nome='$username' AND senha='$password' OR cpf='$username' AND senha='$password'");
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;							
		header('Location:admin/');

    }
}
///////////SESSION_START!\\\\\\\\\\\
?>
