<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-suspect.php";
	$id_suspect = $_POST["id"];
	$contato = $_POST["contato"];
	$data = $_POST["data"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$status = $_POST["status"];
	$hora = $_POST["hora"];
 	$query = "update  suspects  set contato ='{$contato}', data = '{$data}', tel ='{$tel}', email = '{$email}', status = '{$status}'  where id_suspect = {$id_suspect}";
	if(mysqli_query($conexao, $query)){   
  	mysqli_close($conexao);
  	header("Location: ../empresas/suspects.php");  
	}else{
    echo "nao foi adicionado";
	}
?>