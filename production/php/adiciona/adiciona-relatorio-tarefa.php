<?php
	header('Content-Type: text/html; charset=utf-8'); 
	error_reporting(E_ALL ^ E_NOTICE); 
	ob_start();
  session_start();
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-tarefas-contrato.php";
	require_once "../bancos/banco-departamentos-contrato.php";
	require_once "../bancos/banco-usuario.php";
	require_once "../bancos/banco-projeto.php";
	require_once "../logica/logica-usuario.php";
	require_once "../alerta/mostra-alerta.php";
	verificaUsuario();
	$email = $_SESSION["usuario_logado"];
	$usuario = buscaUsuarioEmail($conexao, $email);
	$id_usuario = $usuario['id_usuario'];
	$id_tarefas_contrato = $_GET['id_tarefas_contrato'];
	$tarefa_contrato = buscaTarefaContratoId($conexao, $id_tarefas_contrato);	
	$departamento_contrato = buscaDepartamentoId($conexao, $tarefa_contrato['id_departamento_contrato']);
	$projeto = buscaProjeto($conexao, $departamento_contrato['id_projeto']);
	adicionaRelatorioTarefa($conexao, $id_tarefas_contrato, $id_usuario);
	$id_projeto = $projeto['id_projeto'];
	mysqli_close($conexao);
  header("Location: ../profiles/projeto-profile.php?id_projeto=$id_projeto");
?>