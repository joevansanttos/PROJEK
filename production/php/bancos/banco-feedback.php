<?php

function buscaContratoFeedback($conexao , $id_contrato){
    $query = "select  * from feedback where id_contrato = {$id_contrato}";
    $resultado = mysqli_query($conexao, $query);
    $feedback = mysqli_fetch_assoc($resultado);
    return $feedback;

}

function listaFeedback($conexao){
  $usuarios = array();
    $query = "select  * from usuarios";
    $resultado = mysqli_query($conexao, $query);
    while ($usuario = mysqli_fetch_assoc($resultado)) {
      array_push($usuarios, $usuario);
    }
    
    return $usuarios;
}

function listaConsultorFeedback($conexao, $id_consultor){
  $consultores = array();
    $query = "select  * from feedback where id_consultor = {$id_consultor}";
    $resultado = mysqli_query($conexao, $query);
    while ($consultor= mysqli_fetch_assoc($resultado)) {
      array_push($consultores, $consultor);
    }
    
    return $consultores;
}