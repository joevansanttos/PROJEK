<?php	
	ob_start();
  session_start();
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-consultores.php";
  $consultores = $_GET['my-select'];
  $id_projeto = $_GET['id_projeto'];
  $i = 0;
  $size = count($consultores);
  while ($i < $size) {
     $id_consultor = $consultores[$i];
     adicionaConsultorProjeto($conexao, $id_consultor, $id_projeto);
     $i++;
  }
  mysqli_close($conexao);
  header("Location: ../consultoria/projetos.php");  

?>