<?php

function buscaContrato($conexao , $n_contrato){
    $query = "select  * from contratos where n_contrato = '{$n_contrato}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}

function buscaContratoProspect($conexao , $id_prospect){
    $query = "select  * from contratos where id_prospect = $id_prospect";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}


function buscaContratoUsuario($conexao , $id_consultor){
    $contratos = array();
    $query = "select  * from contratos where id_consultor = $id_consultor";
    $resultado = mysqli_query($conexao, $query);
    while ($contrato = mysqli_fetch_assoc($resultado)) {
        array_push($contratos, $contrato);
    }
    
    return $contratos;
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

function buscaContratoNumero($conexao, $n_contrato){
  $query = "select * from contratos where n_contrato = '{$n_contrato}'";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

function adicionaContrato($conexao, $n_contrato, $id_clientes, $razao, $cnpj, $sede, $data_inicio, $data_fim, $id_consultor, $id_produto, $id_prospect){
  $query = "insert into contratos (n_contrato, id_clientes, razao,  cnpj, sede, data_inicio, data_fim, id_consultor, id_produto, id_contrato_status, id_prospect) values ('{$n_contrato}', $id_clientes, '{$razao}', '{$cnpj}','{$sede}', '{$data_inicio}','{$data_fim}' ,$id_consultor,  $id_produto, 1, $id_prospect)"; 
  mysqli_query($conexao, $query);
}

function atualizaContrato($conexao, $n_contrato){
    $query = "update  contratos  set id_contrato_status ='2' where n_contrato = '{$n_contrato}'";
    mysqli_query($conexao, $query);
}