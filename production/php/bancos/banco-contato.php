<?php

function buscaContato($conexao, $id){
	$usuarios = array();
	  $query = "select * from contato where id_pos_venda = {$id}";
	  $resultado = mysqli_query($conexao, $query);
	  while ($usuario = mysqli_fetch_assoc($resultado)) {
	    array_push($usuarios, $usuario);
	  }
	  
	  return $usuarios;
}

function ordenaContatos($contatos){
	$maior = '11.11.1111';
	foreach ($contatos as  $contato) {
		if(strtotime($maior) < strtotime($contato['data_contato'])){
			$menor = $maior;
			$maior = $contato['data_contato'];
		}
	}

	$ordenados =[];
	array_push($ordenados, $menor);
	array_push($ordenados, $maior);

	return $ordenados;
}