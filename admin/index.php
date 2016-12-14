<!DOCTYPE html>

<?php include("menu.php");?>
			    <!-- Datatables -->
		<link href="scripts/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		<link href="scripts/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
		<!-- widgets -->
        
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count"><?php echo($funcionarioCount);?></div>
                  <h3>membros</h3>
                  <p>Empregados da empresa.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php echo($logCount);?></div>
                  <h3>Registro</h3>
                  <p>log em serviços.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php echo($ServicoCount);?></div>
                  <h3>Serviços ativos</h3>
                  <p>Quantidade de serviços faltando.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo($ServicoCompletoCount);?></div>
                  <h3>Serviços completos</h3>
                  <p>Total de serviços completos.</p>
                </div>
              </div>
            </div>
		<!-- widgets -->
		
		<!-- table de funcionarios -->
		<?php 
		include("adminfunc.php");
		include("donut.php");
		$countCanvasCeo = 0;
		if($tipo_user == "empresa")
		{
			
			
			tableFuncionarios($id_empresa);
			
			$sqlCeo = "SELECT * FROM `projetos` WHERE `fk_empresa` = ".$id_empresa;
			$resultadoCeo = mysqli_query($conexao, $sqlCeo);
			while ($row = mysqli_fetch_array($resultadoCeo, MYSQLI_BOTH))
			{
				TheDonut($id_empresa, $row["id_projeto"], $countCanvasCeo);
				$countCanvasCeo++;
			}
		}
		else if($tipo_user == "funcionario")
		{
			$sqlAdmin = "SELECT * FROM `projetos` WHERE `fk_empresa` = ".$id_empresa;
			$resultado = mysqli_query($conexao, $sqlAdmin);
			
			while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
			{
				if(!isset($countCanvas))
				{
					$countCanvas = 0;
				}
				menuFuncionario($id_empresa, $row["id_projeto"], $countCanvas);
				$countCanvas++;
			}
		}
		?>
		<!-- table de funcionarios -->
		
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <!--<div class="pull-right">
            Site desenvolvido por Vinícius Bretas Avezani de Mello Silva
          </div>-->
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
    <script src="scripts/fastclick.js"></script>
    <!-- NProgress -->
    <script src="scripts/nprogress/nprogress.js"></script>
		<!-- iCheck -->
		<script src="scripts/iCheck/icheck.min.js"></script>
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
		
    <!-- Custom Theme Scripts -->
    <script src="scripts/custom.min.js"></script>
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
          ],
		  "language": {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}
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
