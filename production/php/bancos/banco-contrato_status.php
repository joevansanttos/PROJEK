<?php

function buscaStatus($conexao, $id){
	$query = "select * from contrato_status where id_contrato_status = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}