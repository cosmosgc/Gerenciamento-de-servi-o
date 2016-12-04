<!DOCTYPE html>
<?php include("menu.php");
require_once("../conectar.php");
$data= date("d/m/Y");

require_once("../var.php");
$id_projeto = $_GET["id"];
$sql = "SELECT * FROM `servico` WHERE `id_servico` = 1";
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
		foreach ($row as $column => $description)
			{
				//echo "column: $description <br>"; // teste de tabela
			}
		$id_servico = $row["id_servico"];
		$descricao = $row["descricao"];
		$horas = $row["horas"];
		$fk_funcionario = $row["fk_funcionario"];
		$fk_setor = $row["fk_setor"];
		$completo = $row["completo"];
		$horasTimestamp = strtotime($horas);
		$horasTimestampConvertido = date('m/d/Y', $horasTimestamp);
		$count++;
	}
}
?>

        <!-- page content -->
		<div class="right_col" role="main" style="min-height: 3936px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Formulario do serviço</h3>
              </div>
            </div>
            <div class="clearfix"></div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario do serviço <small>Use uma descricao para maior proveito</small></h2>
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
					<form action='processarCriarServico.php' id='enviarServico' method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome do servi�o <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name='NomeServico' placeholder='Nome do servi�o' id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="well">

                      <!-- DateRange Picker -->
                        <fieldset>
                          <script language="Javascript" src="textToolbox\jquery-1.3.2.min.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.colors.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.styles.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.syntax.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\xhtml.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.min.js" type="text/javascript"></script>
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descri��o do servi�o
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="servico_desc" id='ha' form='enviarServico' ></textarea>
								<script language="Javascript" type="text/javascript">
								$("#ha").css("height","100%").css("width","100%").htmlbox({
									toolbars:[
										[
										// Undo, Redo
										"separator","undo","redo",
										// Bold, Italic, Underline, Strikethrough, Sup, Sub
										"separator","bold","italic","underline","strike","sup","sub",
										// Left, Right, Center, Justify
										"separator","justify","left","center","right",
										// Ordered List, Unordered List, Indent, Outdent
										"separator","ol","ul","indent","outdent",
										// Hyperlink, Remove Hyperlink, Image
										"separator","link","unlink","image"
										
										],
										[// Show code
										"separator","code",
										// Formats, Font size, Font family, Font color, Font, Background
										"separator","formats","fontsize","fontfamily",
										"separator","fontcolor","highlight",
										],
										[
										//Strip tags
										"separator","removeformat","striptags","hr","paragraph",
										// Styles, Source code syntax buttons
										"separator","quote","styles","syntax"
										]
									],
									skin:"blue"
								});

								</script>
									</div>
								</div>
                        </fieldset>
						</div>
						<!-- DateRange Picker -->
                     <input type="hidden" name="idProjeto" value="<?php echo ($id_projeto); ?>"></input>
					 <input type="hidden" name="fk_empresa" value="<?php echo ($id_empresa); ?>"></input>
					 <input type="hidden" name="completo" value="false"></input>
					 <?php
					 $countSector = 1;


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
					$setor[$countSector] = $rowSetor["nome"];
					$setorid[$countSector] = $rowSetor["id_setor"];
				}
				$countSector++;
			}
		}
		?>
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descri��o do servi�o
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
		<?php
echo('<select name="fk_setor" class="form-control"> required');
echo("<option value=''>Nenhum</option>");
$count = 1;

while ($count < $countSector) {
	echo("<option value='$setorid[$count]'>$setor[$count]</option>");
	$count++;
}
echo('</select>');
echo("</div></div>");
////////////////////////////////////////

					 $countFuncionarios = 1;


	$resultadoSetores = mysqli_query($conexao, "SELECT DISTINCT
  (id_funcionario),
  funcionario.nome
FROM
  funcionario,
  setor
WHERE
  funcionario.fk_empresa = '".$id_empresa."' AND id_setor = fk_setor");
		if (!$resultado) {
			$erro = mysqli_error($conexao);
			echo("FAIL $erro");
		} else {
			$countFuncionarios = 1;
			while ($rowFuncionario = mysqli_fetch_array($resultadoSetores))
			{
				foreach ($rowFuncionario as $column => $description)
				{
					$id_funcionario[$countFuncionarios] = $rowFuncionario["id_funcionario"];
					$funcionario_nome[$countFuncionarios] = $rowFuncionario["nome"];
				}
				$countFuncionarios++;
				
			}
		}
		?>
		
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Funcionario Respons�vel
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
		<?php
echo('<select name="fk_funcionario" class="form-control">');
echo("<option value=''>Nenhum</option>");
$count = 1;

while ($count < $countFuncionarios) {
	echo("<option value='$id_funcionario[$count]'>$funcionario_nome[$count]</option>");
	$count++;
}

echo('</select>');
echo("</div></div>");
				?>
					 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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
            Site desenvolvido por Vin�cius Bretas Avezani de Mello Silva
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
	
	
    
  </body>
</html>

<!------------------------------------------------------------------------->