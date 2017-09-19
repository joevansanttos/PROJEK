<?php

function listaProjetos($conexao){
  $projetos = array();
    $query = "select  * from projetos";
    $resultado = mysqli_query($conexao, $query);
    while ($projeto = mysqli_fetch_assoc($resultado)) {
      array_push($projetos, $projeto);
    }
    
    return $projetos;
}

function buscaProjeto($conexao, $id_projeto){
	$query = "select * from projetos where id_projeto = {$id_projeto}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}