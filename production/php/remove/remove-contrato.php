<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-departamentos-contrato.php";
	require_once "../bancos/banco-tarefas-contrato.php";
  $n_contrato = $_GET["n_contrato"];
  $departamentos_contratos = buscaDepartamentosContrato($conexao, $n_contrato);
  foreach ($departamentos_contratos as $departamento) {
  	$id_departamento_contrato = $departamento['id_departamento_contrato'];
  	$tarefas_contrato = listaTarefasContrato($conexao, $id_departamento_contrato);
  	foreach ($tarefas_contrato as $tarefa) {      
  		$id_tarefas_contrato = $tarefa['id_tarefas_contrato'];
  		$query = "delete from tarefas_contrato where id_tarefas_contrato = {$id_tarefas_contrato}";
      mysqli_query($conexao, $query);
  	}
  	$query = "delete from departamentos_contratos where id_departamento_contrato = $id_departamento_contrato";
    mysqli_query($conexao, $query);
  }
  $query = "delete from contratos where n_contrato = '{$n_contrato}'";
  mysqli_query($conexao, $query);
  $query = "delete from pos_venda where n_contrato = '{$n_contrato}'";
  mysqli_query($conexao, $query);
  mysqli_close($conexao);
  header("Location: ../contratos/contratos.php");    
?>