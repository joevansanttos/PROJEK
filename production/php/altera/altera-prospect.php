<?php 
	require_once "../bancos/conecta.php";
	$id_prospect = $_POST["id_prospect"];
	$prod = $_POST["prod"];
	$prob = $_POST["prob"];
	$valor_op = $_POST["valor_op"];
	$valor_est = $_POST["valor_est"];
	$recebimento = $_POST["recebimento"];
	$date = new DateTime($recebimento);
	$recebimento = $date->format('d.m.Y');
	$fechamento = $_POST["fechamento"];
	$date = new DateTime($fechamento);
	$fechamento = $date->format('d.m.Y');
	$id_consultor = $_POST["id_consultor"];
	$query = "update  prospects  set id_produto ={$prod}, prob = {$prob}, valor_op ={$valor_op}, valor_est = {$valor_est}, recebimento = '{$recebimento}', fechamento ='{$fechamento}', id_consultor ={$id_consultor}  where id_prospect = {$id_prospect}";
	if(mysqli_query($conexao, $query)){   
  	mysqli_close($conexao);
  	header("Location: ../empresas/prospects.php");  
	}else{
    echo mysqli_error($conexao);
	}
?>