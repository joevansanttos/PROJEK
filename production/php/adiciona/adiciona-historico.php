<?php include "../bancos/conecta.php";?>
<?php include ("../bancos/banco-market.php");?>
<?php include ("../bancos/banco-lead.php");?>
<?php
$id_market = $_POST["id_market"];
$today = date("d.m.y");
$comentario = $_POST["comentario"];
$id_consultor = $_POST['id_consultor'];

$query = "insert into historico (id_market, id_consultor, comentario, data) values ($id_market, {$id_consultor} ,'{$comentario}' ,'{$today}')";

if(mysqli_query($conexao, $query)){
	mysqli_close($conexao);
	header("Location: ../empresas/market.php");
}else{
	echo mysqli_error($conexao);;
}

?>