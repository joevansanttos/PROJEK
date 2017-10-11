<?php

function buscaDepartamentosContrato($conexao, $id_projeto){
	  $clientes = array();
	    $query = "select  * from departamentos_contratos where id_projeto = $id_projeto";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    
	    return $clientes;
	}

	function adicionaDepartamentoContrato($conexao, $id_departamento, $id_projeto){
	  $query = "insert into departamentos_contratos (id_departamento, id_projeto) values ($id_departamento, $id_projeto)" ;
	  mysqli_query($conexao, $query);
	}

	function buscaDepartamentoId($conexao, $id_departamento_contrato){
  $query = "select * from departamentos_contratos where id_departamento_contrato = {$id_departamento_contrato}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}