<?php
require("conectar.php");
//Receber os dados do formulário
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
$tel = $_POST["telefone"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$setor = $_POST["setorVinculado"];
$id_empresa = $_POST["id_empresa"];
$cadastrado = false;


//Buscar do banco usuários com login igual ao que está se cadastrando
$resultado = mysqli_query($conexao, "SELECT * FROM funcionario
                                    WHERE nome='$username' ");
if ($resultado == false) {
    $erro = mysqli_errno($conexao);
    header("location:erro.php?erro=$erro");
} else {

//Verifica se retornou usuário com o mesmo login cadastrado
$quantidadeDeLinhas = mysqli_num_rows($resultado);
if ($quantidadeDeLinhas == 1) {

    echo("<div class='alert alert-danger'><strong>usuário já existe</strong></div>");
    echo("<h2><a href='cadastro.php'>Voltar para a página de cadastro</a></h2>");
} else {
    //Se não existe usuário com o login cadastrado, insere no banco
	$sql = "INSERT INTO funcionario (nome, senha, telefone, cpf, email, fk_setor, fk_empresa)
                                            VALUES ('$username','$password','$tel','$cpf','$email', '$setor', '$id_empresa')";
    $resultado = mysqli_query($conexao, $sql);
	echo($sql);


    $resultadofuncionario = mysqli_query($conexao, 'SELECT nome FROM funcionario');
    if (!$resultadofuncionario) {
        $erro = mysqli_error($conexao);
        echo("FAIL $erro");
    }
    else {
		$countSector = 1;
        while ($rowSetor = mysqli_fetch_array($resultadofuncionario))
		  {
			foreach ($rowSetor as $column => $description)
			{
			  //echo "column: $description <br>"; // teste de tabela
			}
			$countSector++;
		  }
	header("location:index.html");
	$cadastrado = true;
    echo("<div class='alert alert-success'><strong>Cadastro realizado com sucesso! $username na $id_empresa </strong></div>");
	var_dump($_POST);
    echo("<h2><a href='index.php'>Voltar para a página do Admin</a></h2>");
	}
}
}
if($cadastrado = false)
{
	header("location:cadastro.php?id_empresa=$id_empresa");
}
?>