<?php include ("../bancos/conecta.php");
include ("../bancos/banco-usuario.php");

echo ($_POST["senha"]);
$usuario =  buscaUsuarioLogar($conexao, $_POST["email"]);
if($usuario == null){
  header("Location: ../../index.php?login=0");
}else{
  setcookie("usuario_logado", $usuario["email"]);
  header("Location: ../../index.php?login=1");
}

die();