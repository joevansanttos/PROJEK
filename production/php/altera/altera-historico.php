<?php 
	require_once "../bancos/conecta.php";
	$id_historico = $_POST["id_historico"];
	$descricao = $_POST["descricao"];
 	$query = "update  historico  set descricao ='{$descricao}' where id_historico = {$id_historico}";
	if(mysqli_query($conexao, $query)){   
  	mysqli_close($conexao);
  	header("Location: ../empresas/leads.php");  
	}else{
    
	}
?>