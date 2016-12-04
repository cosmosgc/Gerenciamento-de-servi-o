<?php
function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}
require_once("../conectar.php");
require_once("../var.php");
//debug
$sql = 'SELECT empresa.nome, id_empresa, cnpj, empresa.telefone, empresa.email, cidade, estado, desc_empresa FROM empresa, funcionario, setor WHERE funcionario.nome = "'.$username.'" AND fk_setor = id_setor AND funcionario.fk_empresa = id_empresa';
$resultado = mysqli_query($conexao, 'SELECT * FROM empresa WHERE nome = "'.$username.'"' );
  if (mysqli_num_rows($resultado)==0) {
    $resultado = mysqli_query($conexao, $sql);
      debug_to_console("logado como funcionario");
      if (!$resultado)
    {
        $erro = mysqli_error($conexao);
        echo("FAIL $erro");
    }
  }

$row = mysqli_fetch_assoc($resultado);
$id_empresa = $row["id_empresa"];
$nome_empresa = $row["nome"];
$cnpj = $row["cnpj"];
$telefone = $row["telefone"];
$email = $row["email"];
$cidade = $row["cidade"];
$estado = $row["estado"];
$desc = $row["desc_empresa"];

// util para lista de setores
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
	  //echo "column: $description <br>"; // teste de tabela
	  $setor[$countSector] = $rowSetor["nome"];
	}
	$countSector++;
  }
}


$sql = "SELECT count(DISTINCT (id_funcionario)) FROM funcionario, empresa, setor WHERE funcionario.fk_empresa = $id_empresa AND fk_setor = id_setor";
$resultadoFuncionariosCount = mysqli_query($conexao,$sql);

$funcionarioCountArray =  mysqli_fetch_assoc($resultadoFuncionariosCount);
$funcionarioCount = $funcionarioCountArray["count(DISTINCT (id_funcionario))"];


$sql = "select COUNT(id_servico) from servico, setor where fk_setor = id_setor AND fk_empresa = $id_empresa AND completo = 0";
$resultadoServicoCount = mysqli_query($conexao,$sql);
$ServicoCountArray =  mysqli_fetch_assoc($resultadoServicoCount);
$ServicoCount = $ServicoCountArray["COUNT(id_servico)"];

$sql = "select COUNT(id_servico) from servico, setor where fk_setor = id_setor AND fk_empresa = $id_empresa AND completo = 1";
$resultadoServicoCount = mysqli_query($conexao,$sql);
$ServicoCountArray =  mysqli_fetch_assoc($resultadoServicoCount);
$ServicoCompletoCount = $ServicoCountArray["COUNT(id_servico)"];


?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($nome_empresa);?> | </title>

    <!-- Bootstrap -->
    <link href="scripts/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="scripts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="scripts/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="scripts/iCheck/skins/flat/green.css" rel="stylesheet">


			<!-- Custom Theme Style -->
			
    <!-- Custom Theme Style -->
    <link href="scripts/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span><?php echo($nome_empresa);?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="http://orig09.deviantart.net/df5e/f/2015/322/b/7/spr_player_by_cosmoskitsune-d9h3www.gif" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem vindo,</span>
                <h2><?php echo($username);?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                      <!--
			<li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
			-->
                    </ul>
                  </li>
                  
		  <li><a><i class="fa fa-edit"></i> Projetos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="criarProjeto.php">Criar Projetos</a></li>
                      <li><a href="projects.php">Listagem/edição de projetos</a></li>
                      <li><a href="#">Validação</a></li>
                      <li><a href="#">Log</a></li>
                    </ul>
                  </li>
			<!--
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
		
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
			-->
			<h3>Link para cadastro de funcionarios:</h3>
			<div class="input-group">
                            <input type="text" class="form-control" placeholder="http://royalink.esy.es/cadastro.php?id_empresa=<?php echo($id_empresa);?>" readonly="readonly">
                            <span class="input-group-btn"><span id="copyTarget2">http://royalink.esy.es/cadastro.php?id_empresa=<?php echo($id_empresa);?></span>
                                              <button type="button" class="btn btn-primary" id="copyButton2">Copiar!</button>
                                          </span>
                          </div>
			<!--
<span id="copyTarget2">http://royalink.esy.es/cadastro.php?id_empresa=<?php echo($id_empresa);?></span> <button id="copyButton2">Copy</button><br><br>
			-->
<h3><span id="msg"></span></h3><br>
			<script>
document.getElementById("copyButton2").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyTarget2"), "msg");
});




function copyToClipboardMsg(elem, msgElem) {
	  var succeed = copyToClipboard(elem);
    var msg;
    if (!succeed) {
        msg = "Copia não suportada ou bloqueada.  aperte Ctrl+c para copiar."
    } else {
        msg = "Texto copiado para clipboard."
    }
    if (typeof msgElem === "string") {
        msgElem = document.getElementById(msgElem);
    }
    msgElem.innerHTML = msg;
    setTimeout(function() {
        msgElem.innerHTML = "";
    }, 2000);
}

function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
			</script>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="../logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="http://orig09.deviantart.net/df5e/f/2015/322/b/7/spr_player_by_cosmoskitsune-d9h3www.gif" alt="">Usuario
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">pessoal</span>
                        <span>Configura?s</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">0</span><!--numero de alertas-->
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <!--<a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Atualizei o servi?..
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          O sistema ganhou melhorias incriveis...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Podemlhor aperfei?r mais o sistema...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Temos uma semana para finalizar esse servi?..
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Veja todos os alertas</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>-->
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
