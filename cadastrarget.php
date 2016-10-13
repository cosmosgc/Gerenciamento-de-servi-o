<?php
$resultado = mysqli_query($conexao, 'SELECT * FROM empresa WHERE id_empresa = "'.$_GET["id_empresa"].'"' );
	if (!$resultado) {
        $erro = mysqli_error($conexao);
        echo("FAIL $erro");
    }
	else {   
		$row = mysqli_fetch_assoc($resultado);
		//var_dump($row);
		$username = $row ["nome"];
		$id_empresa = $row["id_empresa"];
		$cnpj = $row["cnpj"];
		$telefone = $row["telefone"];
		$email = $row["email"];
		$cidade = $row["cidade"];
		$estado = $row["estado"];

		$resultadoSetores = mysqli_query($conexao, "SELECT DISTINCT * FROM setor WHERE fk_empresa = '".$id_empresa."'");
		if (!$resultado) {
			$erro = mysqli_error($conexao);
			echo("FAIL $erro");
		} else {
			$countSector = 1;
			while ($rowSetor = mysqli_fetch_array($resultadoSetores))
			{
				foreach ($rowSetor as $column => $description)
				{
					$setor[$countSector] = $rowSetor["nome"];
					$setorid[$countSector] = $rowSetor["id_setor"];
				}
				$countSector++;
			}
		}
    }
    function format_phone_number($number) {
		$tel = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $number);
		return $tel;
	}
?>	