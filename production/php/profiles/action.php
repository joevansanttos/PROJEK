<?php
  header('Content-Type: application/json');
  require_once "../bancos/conecta.php";
  require_once "../logica/logica-usuario.php";
  require_once "../bancos/banco-usuario.php";
  ob_start();
  session_start();
  verificaUsuario();
  $email = $_SESSION["usuario_logado"];
  $usuario = buscaUsuarioEmail($conexao, $email);
  $id_usuario = $usuario['id_usuario'];
  $input = filter_input_array(INPUT_POST);
  $horas= mysqli_real_escape_string($conexao, $input["horas"]);
  $data_fim = mysqli_real_escape_string($conexao, $input["data_fim"]);
  if($input["action"] === 'edit'){
    $query = "  UPDATE tarefas_contrato  SET horas = '".$horas."',  data_fim = '".$data_fim."', id_consultor = '".$id_usuario."' WHERE id_tarefas_contrato = '".$input["id_tarefas_contrato"]."'
 ";
  }

  if(mysqli_query($conexao, $query)){
    mysqli_close($conexao);
  }
  echo json_encode($input);
?>
