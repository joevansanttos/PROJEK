<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-prospect.php";?>


<?php
    $id = $_GET["id"];
    $query = "delete from prospects where id_prospect = $id";
    if(mysqli_query($conexao, $query)){
    	$query = "delete from consultores_prospect where id_prospect = $id";
    	mysqli_query($conexao, $query);
        mysqli_close($conexao);
        header("Location: ../empresas/prospects.php");
    }else{
    }
   
    
?>