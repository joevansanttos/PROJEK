<?php 
	require_once "php/bancos/conecta.php";
	require_once "php/logica/logica-usuario.php";
	logout();
	$_SESSION["success"] = "Usuário deslogado com sucesso!";
	header("Location: index.php");
?>

