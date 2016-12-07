<?php
if(!function_exists('debug_to_console'))
{
	function debug_to_console( $data ) {

		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

		echo $output;
	}
}
require_once("conectar.php");
$data= date("d/m/y");
//$ip= $_SERVER[SERVER_ADDR];
//$timeFloat= $_SERVER[REQUEST_TIME_FLOAT];

session_start();
$tipo_user = $_SESSION['tipo_user'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$_SESSION['username']=$username;
$_SESSION['password']=$password;
$_SESSION['tipo_user']=$tipo_user;
if(!isset($id_empresa_session)){
	$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' AND senha='$password' OR cnpj='$username' AND senha='$password'");
while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
			$id_empresa_session = $row["id_empresa"];
		}
}
if(isset($id_empresa_session) && $id_empresa_session == null){
	$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' AND senha='$password' OR cnpj='$username' AND senha='$password'");
while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
			$id_empresa_session = $row["id_empresa"];
		}
$id_empresa_session = $_SESSION['id_empresa_session'];
$_SESSION['id_empresa_session'] = $id_empresa_session;
}

$sql = "SELECT DISTINCT funcionario.fk_empresa FROM funcionario, empresa, setor WHERE funcionario.fk_empresa = id_empresa AND fk_setor = id_setor AND (funcionario.nome = '$username' OR empresa.nome = '$username')";
	$resultado = mysqli_query($conexao, $sql);
	if (!$resultado) {
	  $erro = mysqli_error($conexao);
	  echo("FAIL $erro");
	} 
	else 
	{
		$count = 1;
		while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
			foreach ($row as $column => $description)
				{
					//echo "column: $description <br>"; // teste de tabela
					$id_empresa_session = $row["fk_empresa"];
				}
			$count++;
	    }
	}
$existeLogin=isset($_SESSION['username']);
if($existeLogin==false){echo("não esta logado");}        
?>
