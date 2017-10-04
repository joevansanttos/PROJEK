<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-market.php";
	require_once ("../bancos/banco-lead.php");
	$id_market = $_POST["id_market"];
	$today = date("d.m.y");
	$comentario = $_POST["comentario"];
	$id_consultor = $_POST['id_usuario'];

$query = "insert into historico (id_market, id_consultor, comentario, data) values ($id_market, {$id_consultor} ,'{$comentario}' ,'{$today}')";

if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	header("Location: ../profiles/cliente-profile.php?id=$id_market");
}else{
	echo mysqli_error($conexao);;
}

?>