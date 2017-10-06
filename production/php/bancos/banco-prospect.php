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

function buscaProspect($conexao, $id, $prod, $valor_op, $id_consultor){
  $query = "select * from prospects where id_clientes = {$id} and id_produto = {$prod} and valor_op = {$valor_op} and id_consultor = $id_consultor";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

function buscaProspectId($conexao, $id){
  $query = "select * from prospects where id_prospect = {$id}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

function adicionaProspect($conexao, $id_market, $prob, $prod, $valor_op, $valor_est, $recebimento, $fechamento, $id_consultor){
  $query = "insert into prospects (id_clientes, prob, id_produto, valor_op, valor_est, recebimento, fechamento, id_consultor) values ($id_market,  $prob , $prod , $valor_op , $valor_est ,'{$recebimento}', '{$fechamento}' , $id_consultor)";
  mysqli_query($conexao, $query);
}