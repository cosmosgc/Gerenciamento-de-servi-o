<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<link rel="stylesheet" type="text/css" href="login.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="fss.js"></script>
	

                <style>
                
			body{
			background: #fd746c; /* fallback for old browsers */
			background: -webkit-linear-gradient(to left, #fd746c , #ff9068); /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to left, #fd746c , #ff9068); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			margin: 0;
			}
			    .container {
			      position: absolute;
			      height: 100%;
			      width: 100%;
				  z-index = -100;
			    }
				
				.stuff{
			      position: fixed;
				  top:50%;
				  left:50%;
				  margin-top: -50px;
				  margin-left: -100px;
				  
				}
	
        	</style>
	</head>
	<body id="container" class="container">	</div>
	<script>
		var container = document.getElementById('container'),
			renderer = new FSS.CanvasRenderer(),
			scene = new FSS.Scene(),
			light = new FSS.Light('#111122', '#FF0022'),
			geometry = new FSS.Plane(container.offsetWidth, container.offsetHeight, 6, 4),
			material = new FSS.Material('#FFFFFF', '#FFFFFF'),
			mesh = new FSS.Mesh(geometry, material),
			now, start = Date.now();
		
		function initialise() {
			scene.add(mesh);
			scene.add(light);
		
			container.appendChild(renderer.element);
		
			window.addEventListener('resize', resize);
		}
		
		function resize() {
			var width = container.offsetWidth, 
				height = container.offsetHeight;
		
			renderer.setSize(width, height);
		
			scene.remove(mesh); // Remove o mesh e limpa o canvas
			renderer.clear();
			
			geometry = new FSS.Plane(width, height, 6, 4); // recria o plano e o mesh
			mesh = new FSS.Mesh(geometry, material);
			
			scene.add(mesh); // adiciona o mesh
		}
		
		function animate() {
			now = Date.now() - start;
		
			light.setPosition(300 * Math.sin(now * 0.001), 200 * Math.cos(now * 0.0005), 60);
		
			renderer.render(scene);
			requestAnimationFrame(animate);
		}
		
		initialise();
		resize();
		animate();
	</script>
	<div class="stuff" >
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
