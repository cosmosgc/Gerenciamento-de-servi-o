<html>
    <head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style>
		body{
		background: #fd746c; /* fallback for old browsers */
		background: -webkit-linear-gradient(to left, #fd746c , #ff9068); /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to left, #fd746c , #ff9068); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}    
        </style>
	</head>
    <body class="container">
        <form action="processarCadastro.php" method="post" class="form-group" >
            <h2>Cadastrar usuario</h2>
            nome: <input type="text" name="username" id="username" class="form-control" required/><br/>
            cnpj: <input type="text" name="cnpj" id="cnpj" class="form-control" required/><br/>
            senha: <input type="password" name="password" id="password" class="form-control" required/><br/>
            telefone: <input type="tel" name="telefone" id="telefone" class="form-control" required/><br/>
            email: <input type="email" name="email" id="email" class="form-control" required/><br/>
            site: <input type="url" name="site" id="site" class="form-control" required/><br/>
            <input type="submit" class="btn btn-default"/>
        </form>
    </body>
</html>
