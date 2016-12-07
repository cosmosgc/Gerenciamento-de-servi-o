<?php
require_once("../conectar.php");
require_once("../var.php");


$nomeFuncionario = $_POST["nomeFuncionario"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$id_funcionario = $_POST["id_funcionario"];
$id_empresa = $_POST["id_empresa"];
$velhaSenha = $_POST["pass"];
$NovaSenha = $_POST["NewPass"];
$NewPass = md5($NovaSenha);

$password = md5($velhaSenha);

$resultado = mysqli_query($conexao, "SELECT * FROM funcionario
                                    WHERE nome='$username' AND senha='$password' OR cpf='$username' AND senha='$password'");
if ($resultado == false) {
    $erro = mysqli_error($conexao);
    echo("location:erro.php?erro=$erro");
} else {
    //Se encontrar o usuário e a senha corretos mostra bem-vindo
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if($quantidadeDeLinhas == 1){
        //echo("bem-vindo $username");
        
while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
			$id_empresa_session = $row["fk_empresa"];
			$senha = $row["senha"];
		}
		if($senha == $password)
		{
			

$sql = "UPDATE
  `funcionario`
SET
  `cpf` = '$cpf',
  `nome` = '$nomeFuncionario',
  `email` = '$email',
  `telefone` = '$telefone',
  senha = '$NewPass'
WHERE
  id_funcionario = '$id_funcionario'";
  
  $resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
	
	


	header("Location: index.php");
		}else{
			echo("Senhas incopátiveis");
		}
		echo("ish");
	}
}

?>