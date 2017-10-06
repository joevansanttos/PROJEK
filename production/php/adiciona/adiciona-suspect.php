<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-market.php";
	require_once "../bancos/banco-suspect.php";
	require_once "../bancos/banco-historico.php";
	require_once "../bancos/banco-consultores-market.php";
	ob_start();
	session_start();
	$id = $_POST["id"];
	$contato = $_POST["contato"];
	$data = $_POST["data"];
	$status = $_POST["status"];
	$hora = $_POST["hora"];
	$id_consultor = $_POST["id_consultor"];
	$tel = $_POST["tel"];
	$email = $_POST["email"];
	$date = new DateTime($data);
	$data = $date->format('d.m.Y');
	$today = date("d.m.y");
	$comentario = $_POST['comentario'];
	adicionaSuspect($conexao, $id, $contato, $data, $status, $hora, $id_consultor, $tel, $email);
	$suspect = buscaSuspect($conexao, $id, $contato, $data, $tel, $email);
	$id_suspect = $suspect['id_suspect'];
	adicionaConsultoresSuspect($conexao, $id_consultor, $id_suspect, $today);
	adicionaHistorico($conexao, $id, $id_consultor, $comentario, $today);
	$_SESSION["success"] = "Suspect $nome adicionado!";
  header("Location: ../empresas/suspects.php");
?>

