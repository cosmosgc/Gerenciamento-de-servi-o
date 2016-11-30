<?php
require_once("../conectar.php");
require_once("../var.php");
$servico_desc = $_POST["servico_desc"];
$idProjeto = $_POST["idProjeto"];
$fk_empresa = $_POST["fk_empresa"];
$fk_funcionario = $_POST["fk_funcionario"];
$fk_setor = $_POST["fk_setor"];
$completo = $_POST["completo"];

if($completo == "false")
{
	$completo = 0;
}else{
	$completo = 1;
}


$sqlStatus = 'INSERT INTO `status`(`descricao`) VALUES ("Recém criado")';
$resultadoInsertStatus = mysqli_query($conexao, $sqlStatus);

$sqlUltimoStatus = "SELECT MAX(id_status) AS id_status FROM status";


$resultadoStatus = mysqli_query($conexao, $sqlUltimoStatus);

while ($rowStatus = mysqli_fetch_array($resultadoStatus))
			{
				$id_status = $rowStatus["id_status"];
			}

$horas = time();
$horasTimestamp = date('Y/m/d H:i:s', $horas);


$sql = "INSERT INTO servico (descricao, fk_projeto, fk_funcionario, fk_setor, completo, horas, fk_status)
                                            VALUES ('$servico_desc','$idProjeto','$fk_funcionario','$fk_setor','$completo','$horasTimestamp', '$id_status')";
    $resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
	header("Location: projects.php");

?>