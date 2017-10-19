<?php include "../bancos/conecta.php";?>

<?php
	$id_pos_venda = $_POST['id_pos_venda'];
  $id_consultor = $_POST['id_consultor'];
  $data_contato = $_POST['data_contato'];
  $date = new DateTime($data_contato);
  $data_contato = $date->format('d.m.Y');
  $comentario = $_POST['comentario'];

  $query = "insert into contato (id_pos_venda, id_consultor, data_contato, comentario, id_status_contato) values ($id_pos_venda, $id_consultor, '{$data_contato}', '{$comentario}', 1)" ;

  if(mysqli_query($conexao, $query)){
  	mysqli_close($conexao);
  	header("Location: ../pos-venda/pos-venda.php");
  }else{
  	echo mysqli_error($conexao);
  }	