<?php 
	require_once "../bancos/conecta.php";
	require_once "../logica/logica-usuario.php";
	ob_start();
	session_start();
  $id = $_GET["id"];
  $query = "delete from usuarios where id_usuario=$id";
  if(mysqli_query($conexao, $query)){
    $query = "delete from profileimg where id_usuario=$id";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    $_SESSION["error"] = "Usuario  removido!";
    header("Location: ../usuarios/usuarios.php");
  }else{

   }


    
   
?>

