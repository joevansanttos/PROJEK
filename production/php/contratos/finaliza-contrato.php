<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>

<?php
	$id = $_GET['id']; 
	$query = "update  contratos  set id_contrato_status ='2' where id_contrato = $id";
	$contrato = buscaContrato($conexao , $id);
	$id_clientes = $contrato['id_clientes'];
	if(mysqli_query($conexao, $query)){
		$query = "insert into pos_venda (id_contrato, id_clientes) values ($id, $id_clientes )";
		mysqli_query($conexao, $query);
		header("Location: ../pos-venda/pos-venda.php");
	}else{
	}

	
