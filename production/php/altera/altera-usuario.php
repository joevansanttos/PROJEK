<?php 
	error_reporting(E_ALL ^ E_NOTICE); 
	require_once "../bancos/conecta.php";	
	require_once "../bancos/banco-usuario.php";
	$id_usuario = $_POST["id_usuario"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$sexo = $_POST["sexo"];
	$estado = $_POST["estado1"];
	$cidade = $_POST["cidade1"];
	$id_profissao = $_POST["profissao"];
	$telefone = $_POST["telefone"];

	$u = buscaUsuario($conexao, $id_usuario);
	if( $senha == $u['senha']){
		$query = "update  usuarios set nome ='{$nome}', sobrenome ='{$sobrenome}', email = '{$email}', sexo = '{$sexo}', cidade = '{$cidade}', estado = '{$estado}', id_profissao = {$id_profissao}, telefone = '{$telefone}'  where id_usuario = {$id_usuario}";
	}else{
		$senha = md5($senha);
		$query = "update  usuarios set nome ='{$nome}', sobrenome ='{$sobrenome}', email = '{$email}', senha = '{$senha}', sexo = '{$sexo}', cidade = '{$cidade}', estado = '{$estado}', id_profissao = {$id_profissao}, telefone = '{$telefone}'  where id_usuario = {$id_usuario}";
	}	

	if(mysqli_query($conexao, $query)){
		mysqli_close($conexao);
		header("Location: ../usuarios/usuarios.php"); 
	}else{
	
	}
