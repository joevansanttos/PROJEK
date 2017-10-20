<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-market.php";
	require_once "../bancos/banco-prospect.php";
	require_once "../bancos/banco-historico.php";
	require_once "../bancos/banco-consultores-market.php";
	ob_start();
	session_start();
	$id_market = $_POST["id"];
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
	$today = date("d.m.y");
	adicionaProspect($conexao, $id_market, $prob, $prod, $valor_op, $valor_est, $recebimento, $fechamento, $id_consultor);
	$prospect = buscaProspect($conexao, $id_market, $prod, $valor_op, $id_consultor);
	$id_prospect = $prospect['id_prospect'];
	adicionaConsultoresProspect($conexao, $id_consultor, $id_prospect, $today);
	mysqli_close($conexao);
	$_SESSION["success"] = "Prospect adicionado!";
  header("Location: ../empresas/prospects.php");
?>

