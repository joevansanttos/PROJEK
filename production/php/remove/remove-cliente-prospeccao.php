<?php include ("conecta.php");?>


<?php
    $id = $_GET["id"];
    $query = "delete from prospeccao where id=$id";
    if(mysqli_query($conexao, $query)){
    }else{
    }
    mysqli_close($conexao);
    header("Location: cliente-profile.php?id=$id");
?>

<?php include "footer.php"?>