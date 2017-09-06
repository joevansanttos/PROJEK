<?php

function buscaProfissao($conexao , $id){
    $query = "select  * from profissao where id_profissao = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}

function listaProfissao($conexao){
  $usuarios = array();
    $query = "select  * from profissao";
    $resultado = mysqli_query($conexao, $query);
    while ($usuario = mysqli_fetch_assoc($resultado)) {
      array_push($usuarios, $usuario);
    }
    
    return $usuarios;
}