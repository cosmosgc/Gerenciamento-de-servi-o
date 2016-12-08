<!DOCTYPE html>

<?php include("menu.php");

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
                <h3>Atualizar Projeto</h3>
              </div>
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dados do atual serviço <small><?php echo($_GET["projetoNome"]);?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action='processarUpdateServico.php' id='enviarServico' method="post" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição do Projeto</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php if (isset($_GET["projetoDesc"]))echo($_GET["projetoDesc"]);?>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição do serviço</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php if (isset($_GET["servDesc"]))echo($_GET["servDesc"]);?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição do Update <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="ServDesc" value="">
                        </div>
                      </div>
                      

                      
					<?php
					require_once("../conectar.php");
					$idQuero = $_SESSION["id_funcionario"];
					$id_servico = $_GET["idServico"];
					$sql = "SELECT * FROM `servico` WHERE fk_funcionario = $idQuero and id_servico = $id_servico";
					$resultado = mysqli_query($conexao, $sql);
					while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
					{
						?>
						<div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Finalizar esse serviço
                          <br>
                          <small class="text-navy">isso irá apresentar o próximo serviço aos funcionarios</small>
                        </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="completar" class="flat"> Finalizar
                            </label>
                          </div>
                          
                        </div>
                      </div>
						<?php
					}
					?>
                      
                      <input type="hidden" name="id_servico" value="<?php echo($_GET["idServico"]); ?>">
					  <input type="hidden" name="id_funcionario" value="<?php echo($_SESSION['id_funcionario']); ?>">
					  <input type="hidden" name="fk_status" value="<?php echo($_SESSION['id_funcionario']); ?>">


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
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
