<?php 
	error_reporting(E_ALL ^ E_NOTICE); 
	require_once "../bancos/conecta.php";
	$senha = md5($_POST["senha"]);
	$id_usuario = $_POST["id_usuario"];
	$email = $_POST["email"];
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$sexo = $_POST["sexo"];
	$estado = $_POST["estado1"];
	$cidade = $_POST["cidade1"];
	$id_profissao = $_POST["profissao"];
	$telefone = $_POST["telefone"];
	$email = $_SESSION["usuario_logado"];
	$id_usuario_logado = $usuario['id_usuario'];


	$query = "update  usuarios set nome ='{$nome}', sobrenome ='{$sobrenome}', email = '{$email}', senha = '{$senha}', sexo = '{$sexo}', cidade = '{$cidade}', estado = '{$estado}', id_profissao = {$id_profissao}, telefone = '{$telefone}'  where id_usuario = {$id_usuario}";

	if(mysqli_query($conexao, $query)){
		
	mysqli_close($conexao);
	header("Location: ../usuarios/usuarios.php"); 
	}else{
	echo mysqli_error($conexao);
	}
