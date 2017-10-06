<?php

function buscaLeads($conexao, $id){
  $clientes = array();
    $query = "select  * from leads where id_clientes = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaClientesLeads($conexao, $id){
  $clientes = array();
    $query = "select  * from leads where id_clientes = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}


function listaLeads($conexao){
  $prospeccoes = array();
    $query = "select  * from leads";
    $resultado = mysqli_query($conexao, $query);
    while ($prospeccao = mysqli_fetch_assoc($resultado)) {
      array_push($prospeccoes, $prospeccao);
    }
    
    return $prospeccoes;
}

function buscaLead($conexao, $id, $nome, $email, $tel, $cargo, $comentario){
  $query = "select * from leads where id_clientes = {$id} and nome = '{$nome}' and email = '{$email}'";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

function buscaLeadId($conexao, $id){
  $query = "select * from leads where id_lead = {$id}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

function adicionaLead($conexao, $id_market, $nome, $email, $tel, $cargo){
  $query = "insert into leads (id_clientes, nome, email, tel, cargo) values ('$id_market','{$nome}' ,'{$email}' ,'{$tel}' ,'{$cargo}')";
  mysqli_query($conexao, $query);
}