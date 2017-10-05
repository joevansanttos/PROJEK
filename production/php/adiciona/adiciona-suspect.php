<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-market.php";
	require_once "../bancos/banco-suspect.php";
	ob_start();
	session_start();
	$id = $_POST["id"];
	$contato = $_POST["contato"];
	$data = $_POST["data"];
	$status = $_POST["status"];
	$hora = $_POST["hora"];
	$id_consultor = $_POST["consultor"];
	$tel = $_POST["tel"];
	$email = $_POST["email"];
	$date = new DateTime($data);
	$data = $date->format('d.m.Y');
	$today = date("d.m.y");
	$comentario = $_POST['comentario'];
	$query = "insert into suspects (id_clientes, contato, data, status, hora,  id_consultor, tel, email) values ('$id','{$contato}' ,'{$data}' ,'{$status}' ,'{$hora}' , {$id_consultor} , '{$tel}', '{$email}')";

	if(mysqli_query($conexao, $query)){
		$suspect = buscaSuspect($conexao, $id, $contato, $data, $tel, $email);
		$query = "insert into consultores_suspect (id_consultor, id_suspect, data) values ({$id_consultor}, {$suspect['id_suspect']},'{$today}')";
		mysqli_query($conexao, $query);
		$query = "insert into historico (id_market, id_consultor, comentario, data) values ($id, {$id_consultor} ,'{$comentario}' ,'{$today}')";
		mysqli_query($conexao, $query);
    mysqli_close($conexao);
    $_SESSION["success"] = "Suspect $nome adicionado!";
    header("Location: ../empresas/suspects.php");
	}else{
	}
?>

