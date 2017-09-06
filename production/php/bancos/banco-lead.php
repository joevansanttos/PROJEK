<?php

function buscaProspeccao($conexao, $id){
  $clientes = array();
    $query = "select  * from leads where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}

function buscaClientesProspeccao($conexao, $id){
  $clientes = array();
    $query = "select  * from leads where id_clientes = {$id}";
    $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
    return $clientes;
}


function listaClientesProspeccao($conexao){
  $prospeccoes = array();
    $query = "select  * from leads";
    $resultado = mysqli_query($conexao, $query);
    while ($prospeccao = mysqli_fetch_assoc($resultado)) {
      array_push($prospeccoes, $prospeccao);
    }
    
    return $prospeccoes;
}