<?php
require_once("../conectar.php");
require_once("../var.php");

$servico_desc = $_POST['servico_desc'];
$fk_funcionario = $_POST['fk_funcionario'];
$fk_setor = $_POST['fk_setor'];
$id_servico = $_POST['id_servico'];
$completo = $_POST['completo'];
$horas = $_POST['horas'];

if($completo == 0){
	$completo = 'false';
	$horas = time();
	$horasTimestamp = date('Y/m/d H:i:s', $horas);
}if($completo == 1){
	$completo = 'true';
	$horasTimestamp = $horas;
}

$sql = "UPDATE
  `servico`
SET
  `descricao` = '$servico_desc',
  `horas` = '$horasTimestamp',
  `fk_funcionario` = $fk_funcionario,
  `fk_setor` = $fk_setor 
WHERE
  id_servico = $id_servico";
  
  $resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
	header("Location: projects.php");
?>