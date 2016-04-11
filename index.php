<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>		
		<form action="login.php" method="post" accept-charset="UTF-8">
			<fieldset class="login">
				<legend>Login</legend>
				
					
				<input name="submitted" id="submitted" value="1"type="hidden">
				 
				<label for="username">Nome ou CNPJ da empresa*:</label>
				<input name="username" id="username" maxlength="50" type="text">
					<br>
				<label for="password">Senha*:</label>
				<input name="password" id="password" maxlength="50" type="password">
				 
				<input name="Submit" value="Submit" type="submit">
				 <a href="cadastro.php">Cadastrar!</a
			</fieldset>
		</form>
        
	</body>
</html>
