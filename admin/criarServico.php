<!DOCTYPE html>
<?php include("menu.php");
require_once("../conectar.php");
$data= date("d/m/Y");

require_once("../var.php");
if($id_empresa_session == null){
	$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' AND senha='$password' OR cnpj='$username' AND senha='$password'");
while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
			$id_empresa_session = $row["id_empresa"];
		}
}
$id_projeto = $_GET["idProjeto"];
$sql = "SELECT DISTINCT
  projetos.id_projeto,
  projetos.nome,
  projetos.descricao,
  projetos.startDate,
  projetos.endDate,
  projetos.horas
FROM
  projetos,
  empresa
WHERE
  projetos.fk_empresa = id_empresa AND projetos.fk_empresa = $id_empresa_session 
AND
projetos.id_projeto = $id_projeto";
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
		$projetoId = $row["id_projeto"];
		$projetoNome = $row["nome"];
		$projetoDescricao = $row["descricao"];
		$projetoStartDate = $row["startDate"];
		$projetoEndDate = $row["endDate"];
		$projetoHoras = $row["horas"];
		$startPlacehold = strtotime($projetoStartDate);
		$projetoStartDateConverted = date('m/d/Y', $startPlacehold);
		$endPlacehold = strtotime($projetoEndDate);
		$projetoEndDateConverted = date('m/d/Y', $endPlacehold);
		$status = "Em andamento";
		$statusColor = "btn btn-warning";
		$progressoPercent = rand(0, 100);
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome do projeto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo($projetoNome);?>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descrição do serviço
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" class="form-control" name="servico_desc" value=''>
								
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
					$setorNome[$countSector] = $rowSetor["nome"];
					$setorid[$countSector] = $rowSetor["id_setor"];
				}
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
$counti = 1;

while ($counti < $countSector) {
	echo("<option value='$setorid[$counti]'>$setorNome[$counti]</option>");
	$counti++;
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
		
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Funcionario Responsável
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
            Site desenvolvido por Vinícius Bretas Avezani de Mello Silva
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