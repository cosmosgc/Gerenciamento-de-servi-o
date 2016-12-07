<!DOCTYPE html>
<?php include("menu.php");
require_once("../conectar.php");
$data= date("d/m/Y");

require_once("../var.php");
$id_funcionario = $_GET["id"];
$sql = "SELECT
  id_funcionario,
  cpf,
  funcionario.nome AS nomeFuncionario,
  email,
  telefone,
  senha,
  fk_setor,
  setor.nome AS nomeSetor,
  funcionario.fk_empresa AS id_empresa
FROM
  `funcionario`,
  setor
WHERE
  fk_setor = id_setor AND `id_funcionario` = ".$id_funcionario;
	$resultado = mysqli_query($conexao, $sql);
	
if (!$resultado) {
  $erro = mysqli_error($conexao);
  echo("FAIL $erro $sql");
} 
else 
{
	$count = 1;
	while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
	{
		$id_funcionario = $row["id_funcionario"];
		$cpf = $row["cpf"];
		$nome = $row["nomeFuncionario"];
		$email = $row["email"];
		$telefone = $row["telefone"];
		$fk_setor = $row["fk_setor"];
		$senha = $row["senha"];
		$setor = $row["nomeSetor"];
		$id_empresa = $row["id_empresa"];
		/*$admin = $row["admin"];
		$ceo = $row["ceo"];
		$criarServico = $row["criarServico"];
		$modificarServico = $row["modificarServico"];
		$verSetores = $row["verSetores"];
		*/
		$count++;
	}
}
?>

        <!-- page content -->
		
		<div class="right_col" role="main" style="min-height: 3936px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Formulario do funcionario</h3>
              </div>
            </div>
            <div class="clearfix"></div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario do funcionario <small>Use uma descricao para maior proveito</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <!--FORMULARIO-->
					<form action='processarEditarFuncionario.php' id='enviarFuncionario' method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="nomeFuncionario" value="<?php echo($nome);?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CPF <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="cpf" value="<?php echo($cpf);?>" data-inputmask="'mask' : '999.999.999-99'">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="email" value="<?php echo($email);?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="telefone" value="<?php echo($telefone);?>" data-inputmask="'mask' : '(999) 9999-9999'">
                        </div>
                      </div>
					  
					  <?php 
$sql = "SELECT * FROM `niveis` WHERE `fk_funcionario` = ".$id_funcionario;
	$resultado = mysqli_query($conexao, $sql);
	
if (!$resultado) {
  $erro = mysqli_error($conexao);
  echo("FAIL $erro $sql");
} 
else 
{
	$count = 1;
	while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
	{
		$admin = $row["admin"];
		$ceo = $row["ceo"];
		$criarServico = $row["criarServico"];
		$modificarServico = $row["modificarServico"];
		$verSetores = $row["verSetores"];
		$count++;
	}
	
}
if(!isset($admin)){
		$admin = 0;
	}
	if(!isset($ceo)){
		$ceo = 0;
	}
	if(!isset($criarServico)){
		$criarServico = 0;
	}
	if(!isset($modificarServico)){
		$modificarServico = 0;
	}
	if(!isset($verSetores)){
		$verSetores = 0;
	}
					  ?>
                      <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Serviços
                          <br>
                          <small class="text-navy">Previlégio de modificar Serviços</small>
                        </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="modServ" <?php if($modificarServico == 1){echo("checked='checked'");}?> class="flat"> Modificar Serviços
                            </label>
                          </div>
                          
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">CEO
                          <br>
                          <small class="text-navy">Titulo de CEO da empresa</small>
                        </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="ceo" <?php if($ceo == 1){echo("checked='checked'");}?> class="flat"> CEO
                            </label>
                          </div>
                          
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Serviço
                          <br>
                          <small class="text-navy">Previlégio de criar serviços em projetos</small>
                        </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="criarServ" <?php if($criarServico == 1){echo("checked='checked'");}?> class="flat"> Criar Serviço
                            </label>
                          </div>
                          
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Setores
                          <br>
                          <small class="text-navy">Previlégio de ver setores da empresa</small>
                        </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="verSetor" <?php if($verSetores == 1){echo("checked='checked'");}?> class="flat"> Ver Setores
                            </label>
                          </div>
                          
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">ADMIN
                          <br>
                          <small class="text-navy">Dar previlégio admin a esse usuario</small>
                        </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="admin" <?php if($admin == 1){echo("checked='checked'");}?> class="flat"> Admin
                            </label>
                          </div>
                          
                        </div>
                      </div>
					  <?php


	$resultadoSetores = mysqli_query($conexao, "SELECT DISTINCT * FROM setor WHERE fk_empresa = '".$id_empresa."'");
		if (!$resultado) {
			$erro = mysqli_error($conexao);
			echo("FAIL $erro");
		} else {
			$countSector = 1;
			while ($rowSetor = mysqli_fetch_array($resultadoSetores))
			{
				
				$setorNome[$countSector] = $rowSetor["nome"];
				$setorid[$countSector] = $rowSetor["id_setor"];
				
				$countSector++;
			}
		}
		?>
		<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Setor
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
		<?php
echo('<select name="fk_setor" class="form-control"> required');
echo("<option value=''>Nenhum</option>");
$countSec = 1;

while ($countSec < $countSector) {
	if($setorid[$countSec] == $fk_setor){
		echo("<option value='$setorid[$countSec]' selected>$setorNome[$countSec]</option>");
	}else{
	echo("<option value='$setorid[$countSec]'>$setorNome[$countSec]</option>");
	}
	$countSec++;
}

echo('</select>');
echo("</div></div>");
?>
					 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<input type="hidden" name="id_funcionario" value="<?php echo($id_funcionario);?>" class="flat">
						<input type="hidden" name="id_empresa" value="<?php echo($id_empresa);?>" class="flat">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
		  </div>
        </div>	
        <!-- /page content -->

        <!-- footer content -->
		<!--
        <footer>
          <div class="pull-right">
            Site desenvolvido por Vin?us Bretas Avezani de Mello Silva
          </div>
          <div class="clearfix"></div>
        </footer>
		-->
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="scripts/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="scripts/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="scripts/fastclick.js"></script>
    <!-- NProgress -->
    <script src="scripts/nprogress/nprogress.js"></script>
		<!-- iCheck -->
		<script src="scripts/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="scripts/custom.min.js"></script>
	
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
		
	    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	 <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->
	
	
    
  </body>
</html>

<!------------------------------------------------------------------------->