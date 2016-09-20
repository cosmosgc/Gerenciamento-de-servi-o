<?php
require("conectar.php");
//Receber os dados do formulário
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
$tel = $_POST["telefone"];
$email = $_POST["email"];
$cpf = $_POST["cnpj"];
$setor = $_POST["setorVinculado"];
$id_empresa = $_POST["id_empresa"];


//Buscar do banco usuários com login igual ao que está se cadastrando
$resultado = mysqli_query($conexao, "SELECT * FROM funcionario
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
    $resultado = mysqli_query($conexao, "INSERT INTO funcionario (nome, senha, telefone, cpf, email, fk_setor)
                                            VALUES ('$username','$password','$tel','$cpf','$email', '$setor')");


    $resultado = mysqli_query($conexao, 'SELECT * FROM funcionario WHERE nome = "'.$username.'"' );
    if (!$resultado) {
        $erro = mysqli_error($conexao);
        echo("FAIL $erro");
    }
    else {
        $row = mysqli_fetch_assoc($resultado);
        $id_empresa = $row["id_empresa"];
    }

    echo("<div class='alert alert-success'><strong>Cadastro realizado com sucesso!<? echo($username); ?></strong></div>");
    echo("<h2><a href='index.php'>Voltar para a página do Admin</a></h2>");
}
}
?>
