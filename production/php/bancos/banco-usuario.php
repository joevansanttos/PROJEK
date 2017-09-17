<?php

function buscaUsuario($conexao , $id){
    $query = "select  * from usuarios where id_usuario = '{$id}'";
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

function buscaUsuarioLogar($conexao , $email, $senha){
    $senha = md5($senha);
    $query = "select  * from usuarios where email = '{$email}' and senha= '{$senha}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}

function buscaUsuarioEmail($conexao , $email){
    $query = "select  * from usuarios where email = '{$email}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}

function buscaImagem($conexao, $id){
    $query = "select  * from profileimg where id_usuario = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

