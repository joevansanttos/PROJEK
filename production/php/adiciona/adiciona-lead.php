<?php 
  ob_start();
  session_start();
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-market.php";
  require_once "../bancos/banco-consultores-market.php";
  require_once "../bancos/banco-lead.php";
  require_once "../bancos/banco-historico.php";
  $id_market = $_POST["id"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $tel = $_POST["tel"];
  $cargo = $_POST["cargo"];
  $id_consultor = $_POST['id_consultor'];
  $comentario = $_POST['comentario'];
  $today = date("d.m.y");
  adicionaLead($conexao, $id_market, $nome, $email, $tel, $cargo);
  $lead = buscaLead($conexao, $id_market, $nome, $email, $tel, $cargo, $comentario);
  $id_lead = $lead['id_lead'];
  adicionaConsultoresLead($conexao, $id_consultor, $id_lead, $today);
  adicionaHistorico($conexao, $id_market, $id_consultor, $comentario, $today);
  $_SESSION["success"] = "Lead $nome adicionado!";
  header("Location: ../empresas/leads.php");
?>

