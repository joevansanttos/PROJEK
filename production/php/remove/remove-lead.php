<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-lead.php";?>


<?php
    $id = $_GET["id"];
    $query = "delete from leads where id_lead = $id";
    if(mysqli_query($conexao, $query)){
        mysqli_close($conexao);
        header("Location: ../empresas/leads.php");
    }else{
    }
   
    
?>