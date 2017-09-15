<?php include "../bancos/conecta.php";?>


<?php
    $id = $_GET["id"];
    $query = "delete from market where id_market = $id";
    if(mysqli_query($conexao, $query)){
        mysqli_close($conexao);
        header("Location: ../empresas/market.php");
    }else{
    }
   
    
?>
