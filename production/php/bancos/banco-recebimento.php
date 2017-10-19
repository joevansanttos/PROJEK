<?php
	function listaCategorias($conexao){
	  $clientes = array();
	    $query = "select  * from categoria";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    return $clientes;
	}

	function listaPagamentos($conexao){
	  $clientes = array();
	    $query = "select  * from pagamentos";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    return $clientes;
	}

	function listaRecebimentos($conexao){
	  $clientes = array();
	    $query = "select  * from recebimentos";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    return $clientes;
	}

	function buscaCategoria($conexao, $id){
		$query = "select * from categoria where id_categoria = {$id}";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

	function buscaPagamento($conexao, $id){
		$query = "select * from pagamentos where id_pagamento = {$id}";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}
?>