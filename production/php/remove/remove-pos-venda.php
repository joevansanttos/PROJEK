<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-pos_venda.php";
  $id_pos_venda = $_GET["id"];
  header("Location: ../pos-venda/pos-venda.php");
  removePos($conexao, $id_pos_venda);    
?>