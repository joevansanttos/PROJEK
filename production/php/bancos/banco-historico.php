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


?>