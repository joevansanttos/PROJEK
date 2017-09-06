<?php include ("conecta.php");?>


<?php
    $id = $_GET["id"];
    $query = "delete from usuarios where id=$id";
    if(mysqli_query($conexao, $query)){
    }else{
    }


    mysqli_close($conexao);
    header("Location: usuarios.php");
?>

<?php include "footer.php"?>