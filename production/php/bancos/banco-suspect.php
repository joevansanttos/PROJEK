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

