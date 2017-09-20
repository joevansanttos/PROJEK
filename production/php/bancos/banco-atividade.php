<?php
function buscaAtividadeProjeto($conexao, $id_projeto, $id_departamento){
	$query = "select * from atividades where id_departamento = {$id_departamento} and $id_projeto = {$id_projeto}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}
