<?php

function buscaDepartamentosContrato($conexao, $id_contrato){
	  $clientes = array();
	    $query = "select  * from departamentos_contratos where id_contrato = {$id_contrato}";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    
	    return $clientes;
	}