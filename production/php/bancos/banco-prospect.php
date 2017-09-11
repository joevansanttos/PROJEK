<?php

function buscaOportunidade($conexao, $id){
  $clientes = array();
    $query = "select  * from prospects where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaProspects($conexao, $id){
    $clientes = array();
    $query = "select  * from prospects where id_clientes = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}


function listaClientesOportunidades($conexao){
  $oportunidades = array();
    $query = "select  * from prospects";
    $resultado = mysqli_query($conexao, $query);
    while ($oportunidade = mysqli_fetch_assoc($resultado)) {
      array_push($oportunidades, $oportunidade);
    }
    
    return $oportunidades;
}

function buscaProspect($conexao, $id, $prod, $valor_op){
  $query = "select * from prospects where id_clientes = {$id} and id_produto = {$prod} and valor_op = {$valor_op}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}