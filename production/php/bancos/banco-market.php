<?php

function buscaMarket($conexao, $id){
	$query = "select * from market where id_market = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaMarketCnpj($conexao, $cnpj){
  $query = "select * from market where cnpj = '{$cnpj}'";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}


function listaMarkets($conexao){
  $clientes = array();
    $query = "select  * from market";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function alteraCliente($conexao, $razao, $nome, $cnpj, $site, $endereco, $estado, $cidade, $segmento, $tel, $bairro, $comentario){
  $query = "update  market  set nome ='{$nome}', razao = '{$razao}', cnpj ='{$cnpj}', site = '{$site}', endereco ='{$endereco}',estado ='{$estado}', cidade = '{$cidade}', segmento='{$segmento}', tel = '{$tel}', bairro='{$bairro}'";
  return mysqli_query($conexao, $query);
}