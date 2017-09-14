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