<?php
///////////DATABASE!\\\\\\\\\\\
require("conectar.php");
//Recebe os dados do formulário
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);

//Busca do banco usuário e senha iguais aos do login
$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' AND senha='$password' OR cnpj='$username' AND senha='$password'");
if ($resultado == false) {
    $erro = mysqli_errno($conexao);
    echo("location:erro.php?erro=$erro");
} else {
    //Se encontrar o usuário e a senha corretos mostra bem-vindo
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if($quantidadeDeLinhas == 1){
        //echo("bem-vindo $username");
        
while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
			$id_empresa_session = $row["id_empresa"];
			$senha = $row["senha"];
		}
		if($senha == $password)
		{
			session_start();
		//$username=$_SESSION['username'];
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['tipo_user']="empresa";
		
        header('Location:admin/');
		}
        


    }else{
        $resultado = mysqli_query($conexao, "SELECT id_funcionario, nome, fk_setor, email, telefone, senha FROM funcionario
                                    WHERE nome='$username' OR cpf='$username'");
		session_start();
		while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
		foreach ($row as $column => $description)
			{
				//echo "column: $description <br>"; // teste de tabela
				$id_funcionario = $row[0];
				$funcionario = $row[1];
				$setor = $row[2];
				$email = $row[3];
				$cpf = $row[4];
				$telefone = $row[5];
				
				$senha = $row["senha"];
				
			}
		}
		if($senha == $password)
		{
			
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['tipo_user']="funcionario";
		$_SESSION['id_funcionario']=$id_funcionario;
		$_SESSION['setor']=$setor;
		$_SESSION['email']=$email;
		$_SESSION['cpf']=$cpf;
		header('Location:admin/');
		}

    }
	//header('Location:index.html');
	
}
///////////SESSION_START!\\\\\\\\\\\

?>
