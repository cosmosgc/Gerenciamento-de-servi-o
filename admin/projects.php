<!DOCTYPE html>
<?php
 include("menu.php");

 if(!function_exists('debug_to_console'))
{
	function debug_to_console( $data ) {

		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

		echo $output;
	}
}
require_once("../conectar.php");
$data= date("d/m/Y");

require_once("../var.php");

$resultado = mysqli_query($conexao, "SELECT * FROM empresa
                                    WHERE nome='$username' AND senha='$password' OR cnpj='$username' AND senha='$password'");
while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
			$id_empresa_session = $row["id_empresa"];
		}
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
  projetos.fk_empresa = id_empresa AND projetos.fk_empresa = $id_empresa_session";
	$resultado = mysqli_query($conexao, $sql);
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Projects <small>Listing design</small></h3>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projectos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Tabela de projetos com progresso e opções de editar</p>

                    <!-- start project list -->
					
					<table class="table table-striped projects">
					<thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Nome do Projeto</th>
                          <th>Setores</th>
                          <th>Progresso do Projeto</th>
                          <th>Status</th>
                          <th style="width: 20%">#Edit</th>
                        </tr>
                      </thead>
					  <tbody>
					
<?php
if (!$resultado) {
  $erro = mysqli_error($conexao);
  echo("FAIL $erro");
} 
else 
{
	$count = 1;
	while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
	{
				//echo "column: $description <br>"; // teste de tabela
				$projetoId = $row["id_projeto"];
				$projetoNome = $row["nome"];
				$projetoDescricao = $row["descricao"];
				$projetoStartDate = $row["startDate"];
				$projetoEndDate = $row["endDate"];
				$projetoHoras = $row["horas"];
				$startPlacehold = strtotime($projetoStartDate);
				$projetoStartDateConverted = date('d/m/Y', $startPlacehold);
				$endPlacehold = strtotime($projetoEndDate);
				$projetoEndDateConverted = date('d/m/Y', $endPlacehold);
				$status = "Em andamento";
				$statusColor = "btn btn-warning";
				
				$sqlServ = "select * from servico WHERE fk_projeto = $projetoId";
				$resultadoServ = mysqli_query($conexao, $sqlServ);
				$countServ = 0;
				$servCompleto = 0;
				while ($row = mysqli_fetch_array($resultadoServ, MYSQLI_BOTH))
					{
						if($row["completo"] == 1)
						{
							$servCompleto++;
						}
						$countServ ++;
					}
					if(!isset($servCompleto))
					{
						$progressoPercent = 0;
					}else{
						if($servCompleto != 0)
						{
						$progressoPercent = round(($servCompleto/$countServ)*100);
						}else{
							$progressoPercent = 0;
						}
					}
			
		$count++;
		
		?>
		
		<tr>
                          <td>#</td>
                          <td>
                            <a><?php echo($projetoNome);?></a>
                            <br />
                            <small>Criado <?php echo($projetoStartDateConverted);?></small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo($progressoPercent); ?>"></div>
                            </div>
                            <small><?php echo($progressoPercent); ?>% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="<?php echo($statusColor); ?> btn-xs">Em andamento</button>
                          </td>
                          <td>
                            <a href="verProjeto.php?id_projeto=<?php echo($projetoId);?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Visualizar </a>
                            <a href="editarProjeto.php?id_projeto=<?php echo($projetoId);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <!--<a href="deletarProjeto.php?id_projeto=<?php echo($projetoId);?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Deletar </a>-->
                          </td>
                        </tr>
		
		<?php
	}
}
?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="scripts/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="scripts/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="scripts/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="scripts/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="scripts/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="scripts/custom.min.js"></script>
  </body>
</html>