<?php
  require_once "../bancos/conecta.php";
  $input = filter_input_array(INPUT_POST);
  $horas= mysqli_real_escape_string($conexao, $input["horas"]);
  $data_fim = mysqli_real_escape_string($conexao, $input["data_fim"]);
  $id_consultor = mysqli_real_escape_string($conexao, $input["id_consultor"]);
  if($input["action"] === 'edit'){
    $query = "  UPDATE tarefas_contrato  SET horas = '".$horas."',  data_fim = '".$data_fim."', id_consultor = '".$id_consultor."' WHERE id_tarefas_contrato = '".$input["id_tarefas_contrato"]."'
 ";
  mysqli_query($conexao, $query);
  }
  echo json_encode($input);
?>
