<?php include ("conecta.php");?>
<?php include ("banco-contrato.php");?>

<?php
	$id = $_GET['id']; 
	$query = "update  contratos  set status ='andamento' where id_contrato = $id";
	if(mysqli_query($conexao, $query)){
		header("Location: contratos.php");
	}else{
	}

	
