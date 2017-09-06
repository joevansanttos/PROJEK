<?php

function buscaUsuario($conexao , $id){
    $query = "select  * from usuarios where id = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}

function listaUsuarios($conexao){
  $usuarios = array();
    $query = "select  * from usuarios";
    $resultado = mysqli_query($conexao, $query);
    while ($usuario = mysqli_fetch_assoc($resultado)) {
      array_push($usuarios, $usuario);
    }
    
    return $usuarios;
}

