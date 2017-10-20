<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-atividade.php";?>
<?php
	$id_projeto = $_GET['id_projeto'];
	$id_departamento = $_GET['departamento'];
	$id_consultor = $_GET['id_consultor'];
	$horas = $_GET['horas'];
	$descricao = $_GET['descricao'];
	$data_inicio = $_GET['data_inicio'];
	$date = new DateTime($data_inicio);
	$data_inicio = $date->format('d.m.Y');
	$data_fim = $_GET['data_fim'];
	$date = new DateTime($data_fim);
	$data_fim = $date->format('d.m.Y'); 

	$nome = $_GET['nome'];
	$cargo = $_GET['cargo'];
	$email = $_GET['email'];
	$tel = $_GET['tel'];
	$query = "insert into atividades (id_projeto, id_departamento_contrato, id_consultor, horas, descricao, data_inicio, data_fim) values ({$id_projeto}, $id_departamento, $id_consultor, $horas, '{$descricao}' , '{$data_inicio}' , '{$data_fim}' )";
	$atividade = buscaAtividadeProjeto($conexao, $id_projeto, $id_departamento);
	if(mysqli_query($conexao, $query)){
		$id_atividade = $atividade['id_atividade'];
		$query = "insert into responsaveis (id_atividade, nome, cargo, email, tel) values ($id_atividade , '{$nome}', '{$cargo}', '{$email}','{$tel}'   )";
		mysqli_query($conexao, $query);
		header("Location: ../consultoria/projetos.php");
	}else{
		echo mysqli_error($conexao);
	}
