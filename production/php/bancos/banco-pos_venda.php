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

function removePos($conexao, $id_pos_venda){
  $query = "delete from pos_venda where id_pos_venda = $id_pos_venda";
  mysqli_query($conexao, $query);
  mysqli_close($conexao);
}

function adicionaPosVenda($conexao, $n_contrato, $id_clientes){
  $query = "insert into pos_venda (n_contrato, id_clientes) values ('{$n_contrato}', $id_clientes )";
  mysqli_query($conexao, $query);
}