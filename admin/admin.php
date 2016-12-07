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
		<?php 
$sql = "SELECT count(DISTINCT (id_funcionario)) FROM funcionario, empresa, setor WHERE funcionario.fk_empresa = id_empresa AND fk_setor = id_setor";
$resultadoFuncionariosCount = mysqli_query($conexao,$sql);

$funcionarioCountArray =  mysqli_fetch_assoc($resultadoFuncionariosCount);
$funcionarioCount = $funcionarioCountArray["count(DISTINCT (id_funcionario))"];


$sql = "select COUNT(id_servico) from servico, setor where fk_setor = id_setor AND  completo = 0";
$resultadoServicoCount = mysqli_query($conexao,$sql);
$ServicoCountArray =  mysqli_fetch_assoc($resultadoServicoCount);
$ServicoCount = $ServicoCountArray["COUNT(id_servico)"];

$sql = "select COUNT(id_servico) from servico, setor where fk_setor = id_setor AND  completo = 1";
$resultadoServicoCount = mysqli_query($conexao,$sql);
$ServicoCountArray =  mysqli_fetch_assoc($resultadoServicoCount);
$ServicoCompletoCount = $ServicoCountArray["COUNT(id_servico)"];
		?>
        
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
                  <h3>Outputs</h3>
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
		
		AdminTable();
		
		?>
		<!-- table de funcionarios -->
		
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <!--<div class="pull-right">
            Site desenvolvido por Vin�cius Bretas Avezani de Mello Silva
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
