<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<link rel="stylesheet" type="text/css" href="login.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body class="container">	
		<form action="login.php" method="post" accept-charset="UTF-8" class="form-group">
			<fieldset class="login">
				<legend>Login</legend>
				
					
				<input name="submitted" id="submitted" value="1"type="hidden" >
				 
				<label for="username">Nome ou CNPJ da empresa*:</label>
				<input name="username" id="username" maxlength="50" type="text" class="form-control">
					<br>
				<label for="password">Senha*:</label>
				<input name="password" id="password" maxlength="50" type="password" class="form-control">
					<br>
				<input name="Submit" value="Submit" type="submit" class="btn btn-default">
				 <a href="cadastro.php">Cadastrar!</a
			</fieldset>
		</form>
        
	</body>
</html>
