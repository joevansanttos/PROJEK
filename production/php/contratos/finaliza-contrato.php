<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>

<?php
	$n_contrato = $_GET['n_contrato']; 
	$query = "update  contratos  set id_contrato_status ='2' where n_contrato = '{$n_contrato}'";
	$contrato = buscaContrato($conexao , $n_contrato);
	$id_clientes = $contrato['id_clientes'];
	if(mysqli_query($conexao, $query)){
		$query = "insert into pos_venda (n_contrato, id_clientes) values ('{$n_contrato}', $id_clientes )";
		mysqli_query($conexao, $query);
		$query = "insert into projetos (n_contrato) values ('{$n_contrato}')";
		mysqli_query($conexao, $query);
		header("Location: ../consultoria/projetos.php");
	}else{
	}

	
