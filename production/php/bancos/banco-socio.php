<?php

	function buscaSociosContrato($conexao, $n_contrato){
	  $clientes = array();
	    $query = "select  * from socios where n_contrato = '{$n_contrato}'";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    
	    return $clientes;
	}