<?php
function buscaAtividadeContrato($conexao, $n_contrato, $id_departamento){
	$query = "select * from atividades where id_departamento = {$id_departamento} and $n_contrato = '{$n_contrato}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}
