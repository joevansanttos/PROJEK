<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-lead.php";
	ob_start();
	session_start();
  $id = $_GET["id"];
  $query = "delete from leads where id_lead = $id";   
  if(mysqli_query($conexao, $query)){
   	$query = "delete from consultores_lead where id_lead = $id";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    $_SESSION["error"] = "Lead Removido!";
    header("Location: ../empresas/leads.php");
  }else{
  }
   
    
?>