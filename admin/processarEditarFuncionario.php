<?php
require_once("../conectar.php");
require_once("../var.php");


$nomeFuncionario = $_POST["nomeFuncionario"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$id_funcionario = $_POST["id_funcionario"];
$fk_setor = $_POST["fk_setor"];
$id_empresa = $_POST["id_empresa"];

if(!isset($_POST['modServ']))
{
	$modServ = 0;
}else{
	$modServ = 1;
}
if(!isset($_POST['criarServ']))
{
	$criarServ = 0;
}else{
	$criarServ = 1;
}
if(!isset($_POST['verSetor']))
{
	$verSetor = 0;
}else{
	$verSetor = 1;
}
if(!isset($_POST['ceo']))
{
	$ceo = 0;
}else{
	$ceo = 1;
}
if(!isset($_POST['admin']))
{
	$admin = 0;
}else{
	$admin = 1;
}



$sql = "UPDATE
  `funcionario`
SET
  `cpf` = '$cpf',
  `nome` = '$nomeFuncionario',
  `email` = '$email',
  `telefone` = '$telefone',
  `fk_setor` = $fk_setor,
  `fk_empresa` = $id_empresa
WHERE
  id_funcionario = '$id_funcionario'";
  
  $resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
		
$sql ="SELECT * FROM `niveis` WHERE `fk_funcionario` = $id_funcionario";
	$resultado = mysqli_query($conexao, $sql);
	
if (!$resultado) {
  $erro = mysqli_error($conexao);
  echo("FAIL $erro $sql");
} 
else 
{
	$quantidadeDeLinhas = mysqli_num_rows($resultado);
    if($quantidadeDeLinhas == 1){
		$sqlNiveis = "UPDATE
  `niveis`
SET
  `criarServico` = $criarServ,
  `verSetores` = $verSetor,
  `modificarServico` = $modServ,
  `admin` = $admin,
  `ceo` = $ceo
WHERE
  fk_funcionario = $id_funcionario";
  $resultadoNiveis = mysqli_query($conexao, $sqlNiveis);
  if (!$resultadoNiveis) {
  $erro = mysqli_error($conexao);
  echo("FAIL $erro $sql");
} 
	}else{
		$sqlNiveis = "INSERT
INTO
  `niveis`(
    `criarServico`,
    `verSetores`,
    `modificarServico`,
    `admin`,
    `ceo`,
	fk_funcionario
  )
VALUES(
  $criarServ,
  $verSetor,
  $modServ,
  $admin,
  $ceo,
  $id_funcionario
)";
$resultadoNiveis = mysqli_query($conexao, $sqlNiveis);
if (!$resultadoNiveis) {
  $erro = mysqli_error($conexao);
  echo("FAIL $erro $sql");
} 
	}
	header("Location: index.php");
	

}
	//header("Location: index.php");
?>