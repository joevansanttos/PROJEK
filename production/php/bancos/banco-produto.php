<?php

function insereProduto($conexao, $nome, $descricao, $beneficios, $entregas, $preco){
	$query = "insert into produtos (nome, descricao, beneficios, entregas, preco) values ('{$nome}','{$descricao}','{$beneficios}','{$entregas}', '{$preco}')";
	return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $nome, $descricao, $beneficios, $entregas, $preco, $id){
	$query = "update  produtos  set nome ='{$nome}', descricao = '{$descricao}', beneficios ='{$beneficios}', entregas = '{$entregas}', preco ='{$preco}'  where id = {$id}";
	return mysqli_query($conexao, $query);
}

function listaProdutos($conexao){
	$produtos = array();
    $query = "select  * from produtos";
    $resultado = mysqli_query($conexao, $query);
    while ($produto = mysqli_fetch_assoc($resultado)) {
    	array_push($produtos, $produto);
    }
    
    return $produtos;
}

function buscaProduto($conexao, $id){
	$query = "select * from produtos where id_produto = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}