<?php

require_once("../conectar.php");
require_once("../var.php");

$nomeProjeto = $_POST["nomeProjeto"];
$descProjeto = $_POST["descProjeto"];
$datarange = $_POST["reservation"];
$idProjeto = $_POST["idProjeto"];


$time_range_from_user = '2014-03-28 17:00:00 to 2014-03-28 18:00:00';

$ranges = explode(' - ', $datarange); //Split string on ' to '

$start_timestamp = strtotime($ranges[0]); //Take first result and turn it into a timestamp
$startDate = date('Y/m/d H:i:s', $start_timestamp);
$end_timestamp = strtotime($ranges[1]); //Take second result and turn it into a timestamp
$endDate = date('Y/m/d H:i:s', $end_timestamp);
$tempo = ($end_timestamp - $start_timestamp) / 60 / 60;

$sql = "UPDATE projetos SET nome='$nomeProjeto', descricao='$descProjeto', horas=$tempo, startDate='$startDate', endDate='$endDate' WHERE id_projeto = $idProjeto";
    $resultado = mysqli_query($conexao, $sql);
	if(!$resultado)
	{
		echo(mysqli_error($conexao));
	}
	//echo("<br>".$sql);
	header("Location: projects.php");

?>