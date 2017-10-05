<?php
		require_once "../bancos/conecta.php";
		require_once "../bancos/banco-projeto.php";
	  $id_projeto = $_GET["id_projeto"];
	  $query = "delete from projetos where id_projeto = $id_projeto";
	  if(mysqli_query($conexao, $query)){
	  	$projeto =  buscaProjeto($conexao, $id_projeto);
	  	$n_contrato = $projeto['n_contrato'];
	  	$query = "update  contratos  set id_contrato_status ='1' where n_contrato = '{$n_contrato}'";
	    mysqli_close($conexao);
	    header("Location: ../consultoria/projetos.php");
	  }else{
	  }

?>