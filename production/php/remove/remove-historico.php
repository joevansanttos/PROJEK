<?php
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-historico.php";
	$id_historico = $_GET["id_historico"];
	$historico = buscaHistorico($conexao, $id_historico);
	$query = "delete from historico where id_historico = $id_historico"; 
	if(mysqli_query($conexao, $query)){
			$id_market = $historico['id_market'];   
	    mysqli_close($conexao);
	    header("Location: ../profiles/cliente-profile.php?id=$id_market");
	}else{
	} 
?>