<?php
require("conectar.php");
//Receber os dados do formulário
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
$tel = $_POST["telefone"];
$email = $_POST["email"];
$cnpj = $_POST["cnpj"];
$desc = $_POST["desc"];
$address = $_POST["address"];
$countSector = $_POST["countSector"];
$ceo = $_POST["CEO"];
$cadastrado = false;


//Buscar do banco usuários com login igual ao que está se cadastrando
$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' ");
if ($resultado == false) {
    $erro = mysqli_errno($conexao);
    header("location:erro.php?erro=$erro");
} else {
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body class="container">
<?php
    //Verifica se retornou usuário com o mesmo login cadastrado
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if ($quantidadeDeLinhas == 1) {
        echo("<div class='alert alert-danger'><strong>usuário já existe</strong></div>");
        echo("<h2><a href='cadastro.php'>Voltar para a página de cadastro</a></h2>");
    } else {
        //Se não existe usuário com o login cadastrado, insere no banco
		$sqlResultado = "INSERT INTO empresa (nome, senha, telefone, cnpj, email, cidade, desc_empresa, ceo)
                                            VALUES ('$username','$password','$tel','$cnpj','$email', '$address', '$desc', '$ceo')";
        $resultado = mysqli_query($conexao, $sqlResultado);
		

		$resultado = mysqli_query($conexao, 'SELECT * FROM empresa WHERE nome = "'.$username.'"' );
		if (!$resultado) {
			$erro = mysqli_error($conexao);
			echo("FAIL $erro");
		}
		else {   
			$row = mysqli_fetch_assoc($resultado);
			$id_empresa = $row["id_empresa"];
		}
		$i = 1;
		while ($i <= $countSector)
		{
			$tempPost = $_POST['setor'.$i];
			$resultado = mysqli_query($conexao, "INSERT INTO setor (nome, fk_empresa)
                                            VALUES ('$tempPost',$id_empresa)");
			$i++;
		}
		//$resultado = mysqli_query($conexao, "INSERT INTO setor (nome, fk_empresa)
        //                                    VALUES ('$nome_setor',$id_empresa)");
        if ($resultado == false) {
            $erro = mysqli_error($conexao);
            echo($erro.$sqlResultado);
        }
		header("location:index.html");
		$cadastrado = true;
        echo("<div class='alert alert-success'><strong>Cadastro realizado com sucesso!</strong></div>");
        echo("<h2><a href='index.php'>Voltar para a página do Admin</a></h2>");
    }
}

if($cadastrado = false)
{
	header("location:erroCadastro/");
}
?>
