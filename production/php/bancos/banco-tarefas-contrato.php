<?php

function listaTarefasContrato($conexao, $id_departamento_contrato){
	$clientes = array();
	  $query = "select  * from tarefas_contrato where id_departamento_contrato = {$id_departamento_contrato}";
	  $resultado = mysqli_query($conexao, $query);
	  while ($cliente= mysqli_fetch_assoc($resultado)) {
	    array_push($clientes, $cliente);
	  }
	  
	  return $clientes;
}

function buscaTarefaContratoId($conexao, $id_tarefas_contrato){
	$query = "select  * from tarefas_contrato where id_tarefas_contrato = {$id_tarefas_contrato}";
	$resultado = mysqli_query($conexao, $query);
	$cliente= mysqli_fetch_assoc($resultado);    
	return $cliente;
}

function adicionaTarefasContrato($conexao, $id_tarefa, $id_departamento_contrato){
  $query = "insert into tarefas_contrato (id_tarefa, id_departamento_contrato, id_status_tarefa) values ({$id_tarefa}, {$id_departamento_contrato}, 1)";
  mysqli_query($conexao, $query);
}

function adicionaRelatorioTarefa($conexao, $id_tarefas_contrato, $id_usuario){
	$today = date("d.m.y");
  $query = "insert into relatorios_tarefa (data_envio, id_tarefas_contrato, id_usuario) values ('{$today}', {$id_tarefas_contrato}, {$id_usuario})";
  mysqli_query($conexao, $query);
}

?>