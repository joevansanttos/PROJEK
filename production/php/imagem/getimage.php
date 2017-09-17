<?php include ("../bancos/conecta.php");?>

<?php
	$id = $_GET['id'];
	$sql = "select * FROM profileimg WHERE id_usuario=$id";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	mysql_close($conecta);

	header("Content-type: image/jpeg");
	echo $usuario['image'];
