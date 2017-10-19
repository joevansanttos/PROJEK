<?php

function listaTarefas($conexao){
  $consultores = array();
    $query = "select  * from tarefas";
    $resultado = mysqli_query($conexao, $query);
    while ($consultor = mysqli_fetch_assoc($resultado)) {
      array_push($consultores, $consultor);
    }
    
    return $consultores;
}

function buscaTarefaId($conexao, $id_tarefa){
	  $clientes = array();
	    $query = "select  * from tarefas where id_tarefa = {$id_tarefa}";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    
	    return $clientes;
}

function buscaTarefaNome($conexao, $id_tarefa){
	    $query = "select  * from tarefas where id_tarefa = {$id_tarefa}";
	    $resultado = mysqli_query($conexao, $query);
	    $cliente= mysqli_fetch_assoc($resultado);    
	    return $cliente;
}