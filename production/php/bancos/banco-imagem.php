<?php
	
	function buscaImagemUsuario($conexao, $id_usuario){
	  $query = "select * from profileimg where id_usuario = {$id_usuario}";
	  $resultado = mysqli_query($conexao, $query);
	  return mysqli_fetch_assoc($resultado);
	}

	function adicionaImagem($conexao, $imgContent, $id_usuario){
	  $query = "insert into profileimg (image, id_usuario) VALUES ('$imgContent', $id_usuario)";
	  mysqli_query($conexao, $query);
	}

	function buscaImagem($conexao, $id_usuario){
		$sql = "SELECT * FROM profileimg WHERE id_usuario = $id_usuario";
		$sth = $conexao->query($sql);
		$result=mysqli_fetch_array($sth);
		return $result;   
	}

?>