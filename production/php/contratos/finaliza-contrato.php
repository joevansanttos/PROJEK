<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>

<?php
	$id = $_GET['id']; 
	$query = "update  contratos  set status ='andamento' where id_contrato = $id";
	if(mysqli_query($conexao, $query)){
		header("Location: ../pos-venda/pos-venda.php");
	}else{
	}

	
