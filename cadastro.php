<?php
include("conectar.php");


if (isset($_GET["id_empresa"]))
{
    
	//abaixo tem o hypertext para caso tenha um GET com id da empresa.
	include("cadastrostart.php");
	include("cadastrarget.php");
	include("cadastrocomget.php");
}else{ //aqui em diante para caso não tenha GET, para cadastro da empresa
	include("cadastrostart.php");
	include("cadastrosemget.php");
}
	?>
