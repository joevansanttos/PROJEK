<?php

function insereConsultor($conexao, $nome, $email, $cel){
  $query = "insert into consultores (nome, email, cel) values ('{$nome}','{$email}','{$cel}')";
  return mysqli_query($conexao, $query);
}



function buscaConsultoresProjeto($conexao, $id_projeto){
  $consultores = array();
    $query = "select  * from consultor_projeto where id_projeto = $id_projeto";
    $resultado = mysqli_query($conexao, $query);
    while ($consultor = mysqli_fetch_assoc($resultado)) {
      array_push($consultores, $consultor);
    }
    
    return $consultores;
}

function adicionaConsultorProjeto($conexao, $id_consultor, $id_projeto){
  $query = "insert into consultor_projeto (id_consultor, id_projeto) values ($id_consultor, $id_projeto)";
  mysqli_query($conexao, $query);
} 