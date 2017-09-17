<?php

function buscaDepartamentosContrato($conexao, $n_contrato){
	  $clientes = array();
	    $query = "select  * from departamentos_contratos where n_contrato = '{$n_contrato}'";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    
	    return $clientes;
	}