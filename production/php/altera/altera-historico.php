<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-historico.php";
	$id_historico = $_POST["id_historico"];
	$historico = buscaHistorico($conexao, $id_historico);
	$comentario = $_POST["comentario"];
 	$query = "update  historico  set comentario ='{$comentario}' where id_historico = {$id_historico}";
	if(mysqli_query($conexao, $query)){
		$id_market = $historico['id_market'];   
  	mysqli_close($conexao);
  	header("Location: ../profiles/cliente-profile.php?id=$id_market");  
	}else{
    
	}
?>