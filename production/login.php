<?php
	require_once "php/bancos/conecta.php";
	require_once "php/bancos/banco-usuario.php";
	require_once "php/logica/logica-usuario.php";
	ob_start();
	session_start();
	$usuario =  buscaUsuarioLogar($conexao, $_POST["email"], $_POST["senha"]);
	if($usuario == null){
		$_SESSION["error"] = "Email ou Senha inválida!";
		header("Location: index.php");
	}else{
		logaUsuario($usuario['email']);
    header("Location: index.php");
	}
?>
