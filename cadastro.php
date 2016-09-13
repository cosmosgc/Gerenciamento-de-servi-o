<html>
    <head>
		<meta charset="UTF-8">
		
        <style>
		/*custom font*/
@import url(http://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0;}

.shader {
			      position: absolute;
			      height: 100%;
			      width: 100%;
				z-index = -100;
				top:0;
				bottom:0;
			    }

body {
	font-family: montserrat, arial, verdana;
	margin: 0;
			padding:0 px;
			padding-left:0px;
			padding-right:0px;
}
/*form styles*/
#msform {
	width: 400px;
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: white;
	text-transform: uppercase;
	font-size: 9px;
	width: 33.33%;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}
        </style>
	</head>
    <body>
	<script src="fss.js"></script>
	
	<div id="container" class="shader"></div>
	<script>
		var container = document.getElementById('container'),
			renderer = new FSS.CanvasRenderer(),
			scene = new FSS.Scene(),
			light = new FSS.Light('#BBBBBB', '#FFFFFF'),
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
	
	<!--
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
		-->
		
<?php
include("conectar.php");


if (isset($_GET["id_empresa"]))
{
    $resultado = mysqli_query($conexao, 'SELECT * FROM empresa WHERE id_empresa = "'.$_GET["id_empresa"].'"' );
	if (!$resultado) {
        $erro = mysqli_error($conexao);
        echo("FAIL $erro");
    }
	else {   
		$row = mysqli_fetch_assoc($resultado);
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
					//echo "column: $description <br>"; // teste de tabela
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
	//abaixo tem o hypertext para caso tenha um GET com id da empresa.
	?>
	<!-- multistep form -->

<form id="msform">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Preencha os dados.</li>
		<li>Setor <? echo($nomeSetor)?></li>
		<li>Empresa: <? echo($username)?></li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Crie a conta da empresa <? echo ($username);?></h2>
		<h3 class="fs-subtitle">Essa é a etapa 1</h3>
		<input type="text" name="email" placeholder="Email" required/>
		<input type="text" name="username" placeholder="Nome da empresa" required/>
		<input type="password" name="password" placeholder="Senha" required/>
		<input type="password" name="passwordcheck" placeholder="Confirmar senha" required/>
		<input type="button" name="next" class="next action-button" value="Next" />
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Setores</h2>
		<h3 class="fs-subtitle">Insira o nome de cada setor</h3>
		<select>
			<? //lista dos setores
		        $count = 1;
		        while ($count < $countSector)
		        {
		        	echo("<option value='$setorid[$count]'>$setor[$count]</option>");
		        	$count++;
		        }
            ?>
		</select>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
		
	</fieldset>
</form>

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<script>
		//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

		</script>
	<?
	
}else{ //aqui em diante para caso não tenha GET, para cadastro da empresa
?>
	
	<!-- multistep form -->

<form id="msform" action="processarCadastro.php" method="post" class="form-group" >
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Configurações da conta.</li>
		<li>Setores</li>
		<li>Detalhes opcionais</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Crie a conta da empresa</h2>
		<h3 class="fs-subtitle">Essa é a etapa 1</h3>
		<input type="text" name="email" placeholder="Email" required/>
		<input type="text" name="username" placeholder="Nome da empresa" required/>
		<input type="password" name="password" placeholder="Senha" required/>
		<input type="password" name="passwordcheck" placeholder="Confirmar senha" required/>
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Setores</h2>
		<h3 class="fs-subtitle">Insira o nome de cada setor</h3>
		<input type="text" name="setor1" placeholder="setor 1" />
		<div id="sector"></div>
		<script>var countSector = 1;</script>
		<input type="button" name="addSector" value="Adicionar mais setores" onclick="myFunction()"/>
		<script>
		function myFunction() {
		countSector++;
		document.getElementById("sector").innerHTML += "<input type='text' name='setor"+ countSector +"' placeholder='setor "+ countSector +"' />";
		document.getElementById("countSector").innerHTML = "<input type='hidden' name='countSector' value='"+ countSector +"'/>";
}		
		</script>
		<div id="countSector"><input type='hidden' name='countSector' value='1'/></div>
		
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
		
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Detalhes Opcionais</h2>
		<h3 class="fs-subtitle">Preencha se achar nescessário</h3>
		<textarea type="" name="desc" placeholder="Descrição da empresa" form="msform"></textarea>
		<input type="text" name="CEO" placeholder="CEO" />
		<input type="text" name="telefone" placeholder="Telefone" />
		<input type="text" name="cnpj" placeholder="cnpj" />
		<textarea name="address" placeholder="Endereço" form="msform"></textarea>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="btn btn-default" value="Submit" />
	</fieldset>
</form>

	<!--
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
		-->
		
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<script>
		//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

		</script>
<?}?>
	
    </body>
</html>
