<?php 
	require_once "../bancos/conecta.php";
	ob_start();
	session_start();
  $id = $_GET["id"];
  $query = "delete from market where id_market = $id";
  if(mysqli_query($conexao, $query)){
    $query = "delete from consultores_market where id_market = $id";
    mysqli_query($conexao, $query);
    $_SESSION["market_removido"] = "Market Removido!";
    mysqli_close($conexao);
    header("Location: ../empresas/market.php");
  }else{
  	
  }
   
    
?>
