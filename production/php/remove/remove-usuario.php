<?php include "../bancos/conecta.php";?>


<?php
    $id = $_GET["id"];
    $query = "delete from usuarios where id_usuario=$id";
    if(mysqli_query($conexao, $query)){
    	mysqli_close($conexao);
    	header("Location: ../usuarios/usuarios.php");
    }else{
    }


    
   
?>

