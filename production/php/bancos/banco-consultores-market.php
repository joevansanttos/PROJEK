<?php

function buscaMarketConsultores($conexao , $id){
  $clientes = array();
    $query = "select  * from consultores_market where id_consultor = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaLeadsConsultores($conexao , $id){
  $clientes = array();
    $query = "select  * from consultores_lead where id_consultor = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaSuspectConsultores($conexao , $id){
  $clientes = array();
    $query = "select  * from consultores_suspect where id_consultor = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaProspectConsultores($conexao , $id){
  $clientes = array();
    $query = "select  * from consultores_prospect where id_consultor = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function adicionaConsultoresMarket($conexao, $id_consultor, $id_market, $today){
  $query = "insert into consultores_market (id_consultor, id_market, data) values ({$id_consultor}, $id_market,'{$today}')";
  mysqli_query($conexao, $query);
} 

function adicionaConsultoresLead($conexao, $id_consultor, $id_lead, $today){
  $query = "insert into consultores_lead (id_consultor, id_lead, data) values ({$id_consultor}, {$id_lead},'{$today}')";
  mysqli_query($conexao, $query);
} 

function adicionaConsultoresSuspect($conexao, $id_consultor, $id_suspect, $today){
  $query = "insert into consultores_suspect (id_consultor, id_suspect, data) values ({$id_consultor}, {$id_suspect},'{$today}')";
  mysqli_query($conexao, $query);
} 

function adicionaConsultoresProspect($conexao, $id_consultor, $id_prospect, $today){
  $query = "insert into consultores_prospect (id_consultor, id_prospect, data) values ({$id_consultor}, {$id_prospect},'{$today}')";
  mysqli_query($conexao, $query);
} 

