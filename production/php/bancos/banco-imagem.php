<?php
	
	function buscaImagemUsuario($conexao, $id_usuario){
	  $query = "select * from profileimg where id_usuario = {$id_usuario}";
	  $resultado = mysqli_query($conexao, $query);
	  return mysqli_fetch_assoc($resultado);
	}

?>