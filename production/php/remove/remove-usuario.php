<?php include "../bancos/conecta.php";?>
<?php include "../logica/logica-usuario.php";?>
<?php
    $id = $_GET["id"];
    $query = "delete from usuarios where id_usuario=$id";
    if(mysqli_query($conexao, $query)){
    	$query = "delete from profileimg where id_usuario=$id";
    	mysqli_query($conexao, $query);
    	mysqli_close($conexao);
    	header("Location: ../usuarios/usuarios.php");
    }else{
    }


    
   
?>

