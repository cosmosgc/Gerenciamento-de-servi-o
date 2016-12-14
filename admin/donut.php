<?php
function TheDonut($idDaEmpresa, $idDoProjeto, $countCanvas)
{
	if(!isset($ServicoCompletoCount))
	{
		include("../conectar.php");
		
		$username = $_SESSION["username"];
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
		
	}
	$sql = "SELECT DISTINCT funcionario.fk_empresa FROM funcionario, empresa, setor WHERE funcionario.fk_empresa = id_empresa AND fk_setor = id_setor AND (funcionario.nome = '$username' OR empresa.nome = '$username')";
	$resultado = mysqli_query($conexao, $sql);
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
					$id_empresa_session = $row["fk_empresa"];
				}
			$count++;
	    }
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
  empresa,
  funcionario
WHERE
  projetos.fk_empresa = id_empresa AND projetos.fk_empresa = $idDaEmpresa AND projetos.id_projeto = $idDoProjeto";
	$resultado = mysqli_query($conexao, $sql);
	
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
				$progressoPercent = rand(0, 100);
			}
		$count++;
	}
}
	?>
	<!-- page content -->
        
              

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalhes do projeto</h2>
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

                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <ul class="stats-overview">
                        <li>
                          <span class="name"> Serviços completos </span>
                          <span class="value text-success"> <?php echo($ServicoCompletoCount);?> </span>
                        </li>
                        <li>
                          <span class="name"> Serviços em progresso </span>
                          <span class="value text-success"> <?php echo($ServicoCount);?> </span>
                        </li>
                        <li class="hidden-phone">
                          <span class="name"> A resposta para tudo </span>
                          <span class="value text-success"> 42 </span>
                        </li>
                      </ul>
                      <br />
					  <?php
                      include("../conectar.php");

	$sqlDonut = "SELECT * FROM projetos WHERE id_projeto = $idDoProjeto";
	$resultadoDonut = mysqli_query($conexao, $sqlDonut);
	while ($row = mysqli_fetch_array($resultadoDonut, MYSQLI_BOTH))
		{
				//echo "column: $description <br>"; // teste de tabela
				$startDate = $row["startDate"];
				$start_timestamp = strtotime($startDate); //Take first result and turn it into a timestamp

		}
	$sqlDonut = "SELECT * FROM servico WHERE fk_projeto = $idDoProjeto";
	$resultadoDonut = mysqli_query($conexao, $sqlDonut);
	$i = 1;
	while ($row = mysqli_fetch_array($resultadoDonut, MYSQLI_BOTH))
		{
			
		foreach ($row as $column => $description)
			{
				//echo "column: $description <br>"; // teste de tabela
				$id_servico[$i] = $row["id_servico"];
				$descricao[$i] = $row["descricao"];
				$horas[$i] = $row["horas"];
				$completo[$i] = $row["completo"];
			}
			if(!isset($label))
				$label = "";
			$label .= '"'.$descricao[$i].'"'.", ";
			$tempoNovo = (strtotime($horas[$i]) - $start_timestamp);
			if(isset($data))
			{
			$data .= round((($tempoNovo - $tempoVelho)/60/60/24)).", " ;
			}else{
				$data = round(($tempoNovo/60/60/24)).", ";
			}
			$tempoVelho = $tempoNovo;

			
			$i++;
		}
	echo("");
	?>
	
					<div class='x_content'>
                    <canvas id='canvasDoughnut<?php echo($countCanvas); ?>'></canvas>
                  </div>
				
				<!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
	
	<script>
	Chart.defaults.global.legend = {
        enabled: false
      };
	// Doughnut chart
      var ctx = document.getElementById("canvasDoughnut<?php echo($countCanvas); ?>");
      var data = {
        labels: [<?php echo($label); ?>
        ],
        datasets: [{
          data: [<?php echo($data); ?>],
          backgroundColor: [
            "#455C73",
            "#9B59B6",
            "#BDC3C7",
            "#26B99A",
            "#3498DB"
          ],
          hoverBackgroundColor: [
            "#34495E",
            "#B370CF",
            "#CFD4D8",
            "#36CAAB",
            "#49A9EA"
          ]

        }]
      };

      var canvasDoughnut = new Chart(ctx, {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: data
      });
	  </script>

                      


                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3 col-xs-12">

                      <section class="panel">

                        <div class="x_title">
                          <h2>Descrição do projeto</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <h3 class="green"><i class="fa fa-info-circle"></i> <?php echo($projetoNome);?></h3>

                          <p><?php echo($projetoDescricao);?></p>
                          <br />

                          <br />
						  <!--
                          <h5>Project files</h5>
                          <ul class="list-unstyled project_files">
                            <li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                            </li>
                            <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a>
                            </li>
                            <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a>
                            </li>
                          </ul>
                          <br />
						  

                          <div class="text-center mtop20">
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                          </div>
                        </div>
						-->

                      </section>

                    </div>
                    <!-- end project-detail sidebar -->

                  </div>
                </div>
              </div>
        <!-- /page content -->
		<!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
	
	<!-- ECharts -->
	<?php 
		  $sql = "SELECT distinct(id_servico), descricao, horas, completo FROM `servico` WHERE fk_projeto = $idDoProjeto";
	$resultado = mysqli_query($conexao, $sql);
		  $count = 1;
	while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
	{
		foreach ($row as $column => $description)
			{
				//echo "column: $description <br>"; // teste de tabela
				$id_servico[$count] = $row["id_servico"];
				$descricao[$count] = $row["descricao"];
				$horas[$count] = $row["horas"];
				$completo[$count] = $row["completo"];
			}
		$count++;
	}
	if(isset($id_servico)){
		
	
	for($i = 1; $i <= count($id_servico); $i++)
	{
		$horasTimestamp = strtotime($horas[$i]);
		$horasTimestampMonth = date('n', $horasTimestamp);
		$tamanhoTempoHoras = (($horasTimestamp - $startPlacehold)/60/60/24);
		$horasDoMes[$horasTimestampMonth] = round ($tamanhoTempoHoras);
		if($completo[$i] == 1)
		{
			if (!isset($qtdServicosCompletoDoMes[$horasTimestampMonth])){
			$qtdServicosCompletoDoMes[$horasTimestampMonth] = 0;
		}
			$qtdServicosCompletoDoMes[$horasTimestampMonth]++  ;
		}
		if($completo[$i] == 0)
		{
			
		if (!isset($qtdServicosDoMes[$horasTimestampMonth])){
			$qtdServicosDoMes[$horasTimestampMonth] = 0;
		}
		
		$qtdServicosDoMes[$horasTimestampMonth]++;
		}
	}
	$stringAtividade = null;
	$stringServico = null;
	$stringServicoCompleto = null;
	for ($i = 1; $i <= 12; $i++)
	{
		if (!isset($horasDoMes[$i]))
		{
			$stringAtividade .= "0, ";
		}
		else
		{
			$stringAtividade .= "$horasDoMes[$i], ";
		}
		if (!isset($qtdServicosDoMes[$i]))
		{
			$stringServico .= "0, ";
		}
		else
		{
			$stringServico .= "$qtdServicosDoMes[$i], ";
		}
		if (!isset($qtdServicosCompletoDoMes[$i]))
		{
			$stringServicoCompleto .= "0, ";
		}
		else
		{
			$stringServicoCompleto .= "$qtdServicosCompletoDoMes[$i], ";
		}
	}
	
	if($stringAtividade == null)
	{
		$stringAtividade = "2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3";
	}
		  ?>
	<?php
}else{echo("Ainda não há dados para criar um resumo");}
}
?>