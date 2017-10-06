<?php 
	require_once "../bancos/conecta.php";
  require_once "../bancos/banco-market.php";
  require_once "../bancos/banco-lead.php";
  require_once "../bancos/banco-suspect.php";
  require_once "../bancos/banco-prospect.php";
  require_once "../bancos/banco-historico.php";
  require_once "../bancos/banco-contrato.php";
	ob_start();
	session_start();
  $id_market = $_GET["id"];
  removeMarket($conexao, $id_market);

  if(mysqli_query($conexao, $query)){
    
    mysqli_query($conexao, $query);
    $_SESSION["error"] = "Market Removido!";
    mysqli_close($conexao);
    header("Location: ../empresas/market.php");
  }else{
  	
  }
   
    
?>
