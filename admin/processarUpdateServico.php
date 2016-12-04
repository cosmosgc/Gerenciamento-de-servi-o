<?php 
include("../conectar.php");
$ServDesc = $_POST["ServDesc"];
$id_servico = $_POST["id_servico"];
$id_funcionario = $_POST["id_funcionario"];
if(isset($_POST["completar"])){
	$completo = 1;
}else{
	$completo = 0;
}
$sql = "SELECT * FROM `servico` WHERE id_servico = $id_servico";

$resultado = mysqli_query($conexao, $sql);
	
if (!$resultado) {
  $erro = mysqli_error($conexao);
  echo("FAIL $erro");
} 
else 
{
	while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
	{
		$descricao = $row["descricao"];
		$horas = $row["horas"];
		$fk_status = $row["fk_status"];
		$completo = $row["completo"];
	}
}
$horas = time();
$horasTimestamp = date('Y/m/d H:i:s', $horas);
	
$sql = "INSERT
INTO
  `registro`(
    `descricao`,
    `horasLog`,
    `fk_funcionario`,
    `fk_servico`,
    `fk_status`
  )
VALUES(
'$ServDesc',
'$horasTimestamp',
'$id_funcionario',
'$id_servico',
'$fk_status'
)";

$resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
	
$sql = "UPDATE
  `status`
SET
  `descricao` = 'Em progresso'
WHERE
  id_status = $fk_status";
$resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
		
if(isset($_POST["completar"])){
	$finalizado = '<span class="label label-default">Finalizado com sucesso</span>';
	$sql = "INSERT
INTO
  `registro`(
    `descricao`,
    `horasLog`,
    `fk_funcionario`,
    `fk_servico`,
    `fk_status`
  )
VALUES(
'$descricao $finalizado',
'$horasTimestamp',
'$id_funcionario',
'$id_servico',
'$fk_status'
)";

$resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
		
$sql = "UPDATE
  `servico`
SET
`horas` = '$horasTimestamp',
  `completo` = 1 
WHERE
  id_servico = $id_servico";
  
  $resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
		
	$sql = "UPDATE
  `status`
SET
  `descricao` = 'Finalizado'
WHERE
  id_status = $fk_status";
$resultado = mysqli_query($conexao, $sql);
	if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro);
        }
}
	header("Location: projects.php");


?>