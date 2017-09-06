<?php

function insereConsultor($conexao, $nome, $email, $cel){
  $query = "insert into consultores (nome, email, cel) values ('{$nome}','{$email}','{$cel}')";
  return mysqli_query($conexao, $query);
}

function listaConsultores($conexao){
  $consultores = array();
    $query = "select  * from usuarios";
    $resultado = mysqli_query($conexao, $query);
    while ($consultor = mysqli_fetch_assoc($resultado)) {
      array_push($consultores, $consultor);
    }
    
    return $consultores;
}