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
                          <th>Salario</th>
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
			<td>$320,800</td>
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
  id_funcionario
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
			<td><a href="editarServico.php?id=<?php echo($id_funcionario[$count]);?>" class="fa fa-wrench" name="table_records"></a></td>
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
?>