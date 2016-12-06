<?php
function tableFuncionarios($idDaEmpresa)
{
$conexao=null;
if($conexao == null)
{
	include("../conectar.php");
}
$sql = "SELECT DISTINCT id_funcionario, funcionario.nome, setor.nome, funcionario.email, cpf, funcionario.telefone FROM funcionario, empresa, setor WHERE funcionario.fk_empresa = '$idDaEmpresa' AND fk_setor = id_setor";
	$resultado = mysqli_query($conexao, $sql);
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
                    <h2>Tabela de funcionarios</small></h2>
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
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="check-all" class="flat"></th>
                          <th>Nome</th>
                          <th>Setor</th>
                          <th>Email</th>
                          <th>CPF</th>
                          <th>Telefone</th>
                          <th>ID</th>
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
				$id_funcionario[$count] = $row[0];
				$funcionario[$count] = $row[1];
				$setor[$count] = $row[2];
				$email[$count] = $row[3];
				$cpf[$count] = $row[4];
				$telefone[$count] = $row[5];
			}
		//output
		?>
		<tr>
			<td><a href='editarfuncionario.php?id=<?php echo($id_funcionario[$count]);?>';" class="fa fa-wrench" name="table_records"></td>
			<td><?php echo($funcionario[$count]); ?></td>
			<td><?php echo($setor[$count]); ?></td>
			<td><?php echo($email[$count]); ?></td>
			<td><?php echo($cpf[$count]); ?></td>
			<td><?php echo($telefone[$count]); ?></td>
			<td><?php echo($id_funcionario[$count]);?></td>
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
}

function tableServicos($idDoProjeto)
{
$conexao=null;
if($conexao == null)
{
	include("../conectar.php");
}
$sql = "SELECT DISTINCT
  servico.descricao,
  setor.nome,
  status.descricao,
  funcionario.nome,
  completo,
  id_funcionario,
  servico.id_servico
FROM
  servico,
  setor,
  status,
  funcionario
WHERE
  fk_projeto = '$idDoProjeto' AND servico.fk_status = id_status AND servico.fk_funcionario = id_funcionario AND servico.fk_setor = id_setor";
	$resultado = mysqli_query($conexao, $sql);
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
                    <h2>Tabela de Serviços</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
						<ul class="dropdown-menu" role="menu">
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
                          <th>Nome</th>
                          <th>Setor</th>
                          <th>status</th>
                          <th>funcionario responsável</th>
                          <th>Ativo</th>
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
				$nomeServico[$count] = $row[0];
				$nomeSetor[$count] = $row[1];
				$status[$count] = $row[2];
				$funcionarioResponsavel[$count] = $row[3];
				$ativo[$count] = $row[4];
				$id_funcionario[$count] = $row[5];
				$id_servico[$count] = $row[6];
				if ($ativo[$count] == 0)
				{
					$ativo[$count] = "em progresso";
				}
				else
				{
					$ativo[$count] = "completo";
				}
			}
		//output
		?>
		<tr>
			<td><a href="editarServico.php?id=<?php echo($id_servico[$count]);?>" class="fa fa-wrench" name="table_records"></a></td>
			<td><?php echo($nomeServico[$count]); ?></td>
			<td><?php echo($nomeSetor[$count]); ?></td>
			<td><?php echo($status[$count]); ?></td>
			<td><?php echo($funcionarioResponsavel[$count]); ?></td>
			<td><?php echo($ativo[$count]); ?></td>
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
}

function menuFuncionario($idDaEmpresa, $idDoProjeto, $countCanvas)
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
                      <div id="mainb<?php echo($countCanvas); ?>" style="height:350px;"></div>

                      <div>

                        <h4>Atividade recente</h4>

                        <!-- end of user messages -->
                        <ul class="messages">
						<!----------- log começa aqui ---------------->
                          <li>
                            <div class="message_date">
                              <h3 class="date text-info">24</h3>
                              <p class="month">Maio</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Usuario</h4>
                              <blockquote class="message">Descrição do log.</blockquote>
                              <br />
                            </div>
                          </li>
						  <!----------- log acaba aqui ---------------->
                          
                        </ul>
                        <!-- end of user messages -->


                      </div>


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
	
	for($i = 1; $i <= count($id_servico); $i++)
	{
		$horasTimestamp = strtotime($horas[$i]);
		$horasTimestampMonth = date('n', $horasTimestamp);
		$tamanhoTempoHoras = (($horasTimestamp - $startPlacehold)/60/60);
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
    <script>
      var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

      var echartBarLine = echarts.init(document.getElementById('mainb<?php echo($countCanvas); ?>'), theme);

      echartBarLine.setOption({
        title: {
          x: 'center',
          y: 'top',
          padding: [0, 0, 20, 0],
          text: 'Performance do projeto',
          textStyle: {
            fontSize: 15,
            fontWeight: 'normal'
          }
        },
        tooltip: {
          trigger: 'axis'
        },
        toolbox: {
          show: true,
          feature: {
            dataView: {
              show: true,
              readOnly: false,
              title: "Text View",
              lang: [
                "Ver texto",
                "Fechar",
                "Atualizar",
              ],
            },
            restore: {
              show: true,
              title: 'Restaurar'
            },
            saveAsImage: {
              show: true,
              title: 'Salvar'
            }
          }
        },
        calculable: true,
        legend: {
          data: ['Revenue', 'Cash Input', 'Time Spent'],
          y: 'bottom'
        },
        xAxis: [{
          type: 'category',
          data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        }],
        yAxis: [{
          type: 'value',
          name: 'Quantidade',
          axisLabel: {
            formatter: '{value} '
          }
        }, {
          type: 'value',
          name: 'Horas',
          axisLabel: {
            formatter: '{value} h'
          }
        }],
        series: [{
          name: 'Serviço concluido',
          type: 'bar',
          data: [<?php echo($stringServicoCompleto); ?>]
        }, {
          name: 'Serviços',
          type: 'bar',
          data: [<?php echo($stringServico); ?>]
        }, {
          name: 'Tempo gasto',
          type: 'line',
          yAxisIndex: 1,
          data: [<?php echo($stringAtividade); ?>]
        }]
      });
    </script>
    <!-- /ECharts -->
	<?php
}

function AdminTable()
{
	$conexao=null;
if($conexao == null)
{
	include("../conectar.php");
}
$sqlAdmin = "SELECT DISTINCT
  id_funcionario,
  funcionario.nome AS nomeFuncionario,
  setor.nome AS nomeSetor,
  funcionario.email,
  cpf,
  funcionario.telefone,
  empresa.nome AS nomeEmpresa
FROM
  funcionario,
  empresa,
  setor
WHERE
  funcionario.fk_empresa = id_empresa AND fk_setor = id_setor";
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
                    <h2>Tabela de admin</small></h2>
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
                          <th>Nome</th>
                          <th>Setor</th>
                          <th>Email</th>
                          <th>CPF</th>
                          <th>Telefone</th>
                          <th>ID</th>
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
				$id_funcionario[$count] = $row[0];
				$funcionario[$count] = $row[1];
				$setor[$count] = $row[2];
				$email[$count] = $row[3];
				$cpf[$count] = $row[4];
				$telefone[$count] = $row[5];
				$nomeEmpresa[$count] = $row[6];
			}
		//output
		?>
		<tr>
			<td><a href='editarfuncionarioadmin.php?id=<?php echo($id_funcionario[$count]);?>';" class="fa fa-wrench" name="table_records"></td>
			<td><?php echo($funcionario[$count]); ?></td>
			<td><?php echo($setor[$count]); ?></td>
			<td><?php echo($email[$count]); ?></td>
			<td><?php echo($cpf[$count]); ?></td>
			<td><?php echo($telefone[$count]); ?></td>
			<td><?php echo($id_funcionario[$count]);?></td>
			<td><?php echo($nomeEmpresa[$count]);?></td>
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
}

function donutChart($id_projeto, $count)
{
		include("../conectar.php");

	$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto";
	$resultado = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
		{
				//echo "column: $description <br>"; // teste de tabela
				$startDate = $row["startDate"];
				$start_timestamp = strtotime($startDate); //Take first result and turn it into a timestamp

		}
	$sql = "SELECT * FROM servico WHERE fk_projeto = $id_projeto";
	$resultado = mysqli_query($conexao, $sql);
	$i = 1;
	while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH))
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
			if($i != 1)
			{
			$data .= $tempoNovo - $tempoVelho;
			}else{
				$data = $tempoNovo.", ";
			}
			
			$tempoVelho = $tempoNovo;

			
			$i++;
		}
	echo("<div class='x_content'>
                    <canvas id='canvasDoughnut$count'></canvas>
                  </div>");
	?>
	<script>
	// Doughnut chart
      var ctx = document.getElementById("canvasDoughnut<?php echo($count); ?>");
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
	  <?php
}
?>