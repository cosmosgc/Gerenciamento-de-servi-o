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
                <h3>Serviços <small></small></h3>
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

                    <p>Visualizar serviço</p>

                    <!-- start service list -->
<?php
	$conexao=null;
if($conexao == null)
{
	include("../conectar.php");
}
$sqlAdmin = "SELECT id_setor, setor.nome as NomeSetor, fk_empresa, empresa.nome as NomeEmpresa FROM `setor`, empresa WHERE fk_empresa = id_empresa AND fk_empresa = ".$id_empresa;
	$resultado = mysqli_query($conexao, $sqlAdmin);
	if (!$resultado) {
	  $erro = mysqli_error($conexao);
	  echo("FAIL $erro");
	} 
	else 
	{
		?>
		    
		<link href="scripts/custom.min.css" rel="stylesheet">
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabela de serviços</small></h2>
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
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="check-all" class="flat"></th>
                          <th>nome</th>
						  <th>Empresa</th>
                        </tr>
                      </thead>


                      <tbody>
					  
		<?php
		$count = 1;
		while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
		foreach ($row as $column => $description)
			{
				//echo "column: $description <br>"; // teste de tabela
				$id_setor[$count] = $row[0];
				$setor_nome[$count] = $row[1];
				$id_empresa[$count] = $row[2];
				$nome_empresa[$count] = $row[3];
			}
		//output
		?>
		<tr>
			<td><a href='editarSetor.php?id=<?php echo($id_setor[$count]);?>';" class="fa fa-wrench" name="table_records"></td>
			<td><?php echo($setor_nome[$count]); ?></td>
			<td><?php echo($nome_empresa[$count]); ?></td>
		</tr>
		<?php
		$count++;
	    }
		?>
		
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
			  
		<?php
	}
	?>
                    <!-- end service list -->
					<a href="criarSetor.php?idProjeto=<?php echo($id_empresa);?>" class="btn btn-info" role="button">Criar setor</a>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                        </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
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