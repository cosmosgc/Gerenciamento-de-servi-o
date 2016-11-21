<!DOCTYPE html>
<head>
<meta charset="UTF-8">
</head>
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
$idProjeto = $_GET["id_projeto"];
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
projetos.id_projeto = $idProjeto";
	$resultado = mysqli_query($conexao, $sql);


?>
	 <!-- Datatables -->
		<link href="scripts/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Projects <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edição de projeto</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Visualizar projeto</p>

                    <!-- start project list -->
					
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
		
		?>
		<form id="msform" action="UpdateProjeto.php" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome do projeto 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nomeProjeto" id="first-name" value="<?php echo($projetoNome); ?>" readonly="readonly" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descricao do projeto 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo($projetoDescricao); ?>
                        </div>
                      </div>
                      <div class="well">

                      <!-- DateRange Picker -->
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="input-prepend input-group">
                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="<?php echo($projetoStartDateConverted); ?> - <?php echo($projetoEndDateConverted); ?>"readonly="readonly">
                              </div>
                            </div>
                          </div>
                        </fieldset>
						</div>
						<!-- DateRange Picker -->
                     <input type="hidden" name="idProjeto" value="<?php echo ($idProjeto); ?>"></input>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                        </div>
                      </div>
					  
					
					  
								
								
		
		<?php
	}
}
?>

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
	<!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="scripts/custom.min.js"></script>
	  <!-- Datatables -->
					<script src="scripts/datatables.net/js/jquery.dataTables.min.js"></script>
					<script src="scripts/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
					<script src="scripts/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
					<script src="scripts/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
					<script src="scripts/datatables.net-buttons/js/buttons.flash.min.js"></script>
					<script src="scripts/datatables.net-buttons/js/buttons.html5.min.js"></script>
					<script src="scripts/datatables.net-buttons/js/buttons.print.min.js"></script>
					<script src="scripts/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
					<script src="scripts/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
					<script src="scripts/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
					<script src="scripts/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
					<script src="scripts/datatables.net-scroller/js/datatables.scroller.min.js"></script>
					<script src="scripts/jszip/dist/jszip.min.js"></script>
					<script src="scripts/pdfmake/build/pdfmake.min.js"></script>
					<script src="scripts/pdfmake/build/vfs_fonts.js"></script>
					
		<!-- Datatables -->
		<script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
	
	
	
  </body>
</html>