<?php include "../bancos/conecta.php";?>


<?php
    $id = $_GET["id"];
    $query = "delete from suspects where id_suspect = $id";
    if(mysqli_query($conexao, $query)){
    	$query = "delete from consultores_suspect where id_suspect = $id";
    	mysqli_query($conexao, $query);
        mysqli_close($conexao);
        header("Location: ../empresas/suspects.php");
    }else{
    }
   
    
?>