<?php

function buscaHistoricos($conexao, $id){
  $clientes = array();
  $query = "select  * from historico where id_market = {$id}";
  $resultado = mysqli_query($conexao, $query);
    while ($cliente= mysqli_fetch_assoc($resultado)) {
      array_push($clientes, $cliente);
    }
    
  return $clientes;
}

function buscaHistorico($conexao, $id){
  $query = "select * from historico where id_historico = {$id}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

function adicionaHistorico($conexao, $id, $id_consultor, $comentario, $today){
  $query = "insert into historico (id_market, id_consultor, comentario, data) values ($id, {$id_consultor} ,'{$comentario}' ,'{$today}')";
  mysqli_query($conexao, $query);
} 

?>