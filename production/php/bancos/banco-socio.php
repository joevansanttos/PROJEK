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

	function adicionaSocio($conexao, $socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $n_contrato){
	 	$query = "insert into socios (nome, cpf, residencia, nacionalidade, profissao, civil, n_contrato ) values ('$socio', '$cpf', '$residencia', '$nacionalidade', '$profissao', '$civil', '{$n_contrato}' )" ;
	  mysqli_query($conexao, $query);
	}