<!-- multistep form -->

<form id="msform" action="processarCadastroMembro.php" method="post" class="form-group">
	<!-- progressbar -->
	<!-- fieldsets -->
	<fieldset>
		<h6>Empresa: <?php echo($username)?></h6>
		<h6>email: <?php echo($email); ?></h6>
		<h6>Telefone: <?php echo($telefone); ?></h6>
		<h2 class="fs-title">Crie a conta da empresa <?php echo ($username);?></h2>
		<h3 class="fs-subtitle">Essa é a etapa 1</h3>
		<input type="text" name="email" placeholder="Email" required/>
		<input type="text" name="username" placeholder="Nome do usuario" required/>
		<input type="text" name="cpf" placeholder="cpf"/>
		<input type="text" name="telefone" placeholder="Telefone" />
		<input type="password" name="password" placeholder="Senha" required/>
		<input type="password" name="passwordcheck" placeholder="Confirmar senha" required/>
	<!--</fieldset>
	<fieldset> -->
		<h2 class="fs-title">Setores</h2>
		<h3 class="fs-subtitle">Qual setor deseja se vincular</h3>
		<select name="setorVinculado" class="form-control">

			<?php //lista dos setores

			if (isset($_GET["setor"]))//caso tenha um GET dizendo qual setor esse usuario deve pertencer.
			{
				echo("<option value=".$_GET['setor_id'].">".$_GET['setor']."</option>");
			}else {
				echo("<option value=''>Nenhum</option>");
				$count = 1;
				while ($count < $countSector) {
					echo("<option value='$setorid[$count]'>$setor[$count]</option>");
					$count++;
				}
			}
            ?>
		</select><br>
		<input type="hidden" name="id_empresa" value="<?php echo("$id_empresa");?>">
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
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
	return true;
})

		</script>
		
	
    </body>
</html>