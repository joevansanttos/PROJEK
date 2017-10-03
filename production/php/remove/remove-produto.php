<?php
	require_once "../bancos/conecta.php";
	$id_produto = $_GET["id_produto"];
	$query = "delete from produtos where id_produto = $id_produto";
	if(mysqli_query($conexao, $query)){
	  mysqli_close($conexao);
	  header("Location: ../produtos/produtos.php");
	}else{

	}
?>