<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-tarefas.php";?>
<?php include "../bancos/banco-departamentos-contrato.php";?>
<?php
	$n_contrato = $_GET['n_contrato']; 
	$query = "update  contratos  set id_contrato_status ='2' where n_contrato = '{$n_contrato}'";
	$contrato = buscaContrato($conexao , $n_contrato);
	$id_clientes = $contrato['id_clientes'];
	if(mysqli_query($conexao, $query)){
		$query = "insert into pos_venda (n_contrato, id_clientes) values ('{$n_contrato}', $id_clientes )";
		mysqli_query($conexao, $query);
		$query = "insert into projetos (n_contrato) values ('{$n_contrato}')";
		mysqli_query($conexao, $query);
		$tarefas = listaTarefas($conexao);
		$departamentos_contrato = buscaDepartamentosContrato($conexao, $n_contrato);
		foreach ($departamentos_contrato as $departamento) {
			$id_departamento_contrato = $departamento['id_departamento_contrato'];
			foreach ($tarefas as $tarefa) {
				$id_tarefa = $tarefa['id_tarefa'];
				$query = "insert into tarefas_contrato (id_tarefa, id_departamento_contrato) values ({$id_tarefa}, {$id_departamento_contrato})";
				mysqli_query($conexao, $query);
			}
		}
		
		
		header("Location: ../consultoria/projetos.php");
	}else{
	}

	
