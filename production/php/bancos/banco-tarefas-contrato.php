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

function adicionaTarefasContrato($conexao, $id_tarefa, $id_departamento_contrato){
  $query = "insert into tarefas_contrato (id_tarefa, id_departamento_contrato) values ({$id_tarefa}, {$id_departamento_contrato})";
  mysqli_query($conexao, $query);
}