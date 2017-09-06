<?php

function buscaContrato($conexao , $id){
    $query = "select  * from contratos where id_contrato = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}


function insereContrato($conexao,  $empresa, $nome, $cnpj, $sede, $administrador, $cpf, $residencia, $produto){
	$query = "insert into contratos (empresa, nome, cnpj, sede, administrador, cpf, residencia, produto) values ('{$empresa}','{$nome}','{$cnpj}','{$sede}', '{$administrador}', '{$cpf}', '{$residencia}', '{$produto}')";
	return mysqli_query($conexao, $query);
}

function listaContratos($conexao){
	$contratos = array();
    $query = "select  * from contratos";
    $resultado = mysqli_query($conexao, $query);
    while ($contrato = mysqli_fetch_assoc($resultado)) {
    	array_push($contratos, $contrato);
    }
    
    return $contratos;
}