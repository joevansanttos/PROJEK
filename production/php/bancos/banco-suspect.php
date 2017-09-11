<?php

function buscaApresentacao($conexao, $id){
  $clientes = array();
    $query = "select  * from suspects where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaClientesApresentacao($conexao, $id){
  $clientes = array();
    $query = "select  * from suspects where id_clientes = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}


function listaClientesApresentacao($conexao){
  $apresentacoes = array();
    $query = "select  * from suspects";
    $resultado = mysqli_query($conexao, $query);
    while ($apresentacao = mysqli_fetch_assoc($resultado)) {
      array_push($apresentacoes, $apresentacao);
    }
    
    return $apresentacoes;
}

function buscaSuspect($conexao, $id, $contato, $data, $tel, $email){
  $query = "select * from suspects where id_clientes = {$id} and contato = '{$contato}' and data = '{$data}'";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

function buscaSuspectId($conexao, $id){
  $query = "select * from suspects where id_suspect = {$id}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}