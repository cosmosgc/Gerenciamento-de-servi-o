<?php
require("conectar.php");
//Receber os dados do formulário
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
$tel = $_POST["tel"];
$email = $_POST["email"];
$cnpj = $_POST["email"];

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
        $resultado = mysqli_query($conexao, "INSERT INTO empresa (nome, senha, telefone, cnpj, email)
                                            VALUES ('$username','$password','$tel','$cnpj','$email')");
        if ($resultado == false) {
            $erro = mysqli_errno($conexao);
            //header("location:erro.php?erro=$erro");
            echo($erro);
        }
        echo("<div class='alert alert-success'><strong>Cadastro realizado com sucesso!</strong></div>");
        echo("<h2><a href='http://beta.nooutroladodefurria.esy.es'>Voltar para a página do Admin</a></h2>");
    }
}
?>
