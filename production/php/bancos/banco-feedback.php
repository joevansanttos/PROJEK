<?php

function buscaFeedback($conexao , $id){
    $query = "select  * from feedback where id_feedback = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $feedback = mysqli_fetch_assoc($resultado);
    return $feedback;

}

function buscaContratoFeedback($conexao , $n_contrato){
    $query = "select  * from feedback where n_contrato = '{$n_contrato}'";
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
    if(!empty($consultores)){
      
    }
    return $consultores;
}