<?php 
	require_once "../bancos/conecta.php";
  $id = $_GET["id"];
  $query = "delete from pos_venda where id_pos_venda = $id";
  if(mysqli_query($conexao, $query)){
    mysqli_close($conexao);
    header("Location: ../pos-venda/pos-venda.php");
  }else{

  }
   
    
?>