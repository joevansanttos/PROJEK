<?php

function buscaType($conexao, $id){
	$query = "select * from type where id_type = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}