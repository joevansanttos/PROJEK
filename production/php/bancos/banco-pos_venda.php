<?php

function buscaCliente($conexao, $id){
	$query = "select * from pos_venda where id_cliente = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}




function listaClientes($conexao){
  $usuarios = array();
    $query = "select  * from pos_venda";
    $resultado = mysqli_query($conexao, $query);
    while ($usuario = mysqli_fetch_assoc($resultado)) {
      array_push($usuarios, $usuario);
    }
    
    return $usuarios;
}

function buscaPosVenda($conexao, $id){
  $query = "select * from pos_venda where id_pos_venda = {$id}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}