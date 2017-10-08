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

function listaConsultores($conexao){
  $usuarios = array();
    $query = "select  * from usuarios where id_profissao = 1";
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



function adicionaUsuario($conexao, $senha, $nome, $sobrenome, $email, $sexo, $estado, $cidade, $id_profissao, $telefone){
  $query = "insert into usuarios (senha, nome, sobrenome, email, sexo, estado, cidade, id_profissao, telefone) values ('{$senha}','{$nome}', '{$sobrenome}', '{$email}' ,'{$sexo}','{$estado}','{$cidade}', {$id_profissao} ,'{$telefone}' )";
  mysqli_query($conexao, $query);
}



