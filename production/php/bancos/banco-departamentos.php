<?php

function listaDepartamentos($conexao){
  $usuarios = array();
    $query = "select  * from departamentos";
    $resultado = mysqli_query($conexao, $query);
    while ($usuario = mysqli_fetch_assoc($resultado)) {
      array_push($usuarios, $usuario);
    }
    return $usuarios;
}