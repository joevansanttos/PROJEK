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


function buscaDepartamento($conexao, $id_departamento){
	  $clientes = array();
	    $query = "select  * from departamentos where id_departamento = {$id_departamento}";
	    $resultado = mysqli_query($conexao, $query);
	    while ($cliente= mysqli_fetch_assoc($resultado)) {
	      array_push($clientes, $cliente);
	    }
	    
	    return $clientes;
}

function buscaNomeDepartamento($conexao, $id_departamento){
  $query = "select * from departamentos where id_departamento = {$id_departamento}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}