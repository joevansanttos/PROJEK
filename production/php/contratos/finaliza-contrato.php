<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-contrato.php";
	require_once "../bancos/banco-tarefas.php";
	require_once "../bancos/banco-projeto.php";
	require_once "../bancos/banco-pos_venda.php";
	require_once "../bancos/banco-tarefas-contrato.php";
	require_once "../bancos/banco-departamentos-contrato.php";
	$n_contrato = $_GET['n_contrato']; 
	atualizaContrato($conexao, $n_contrato);
	$contrato = buscaContrato($conexao , $n_contrato);
	$id_clientes = $contrato['id_clientes'];
	adicionaPosVenda($conexao, $n_contrato, $id_clientes);
	$projeto = buscaProjetoContrato($conexao, $n_contrato);
	$id_projeto = $projeto['id_projeto'];
	$departamentos_contrato = buscaDepartamentosContrato($conexao, $id_projeto );
	foreach ($departamentos_contrato as $departamento) {
		$id_departamento_contrato = $departamento['id_departamento_contrato'];
		$tarefas = listaTarefas($conexao);
		foreach ($tarefas as $tarefa) {
			$id_tarefa = $tarefa['id_tarefa'];
			adicionaTarefasContrato($conexao, $id_tarefa, $id_departamento_contrato);
		}
	}
	mysqli_close($conexao);
	header("Location: ../pos-venda/pos-venda.php");
	
