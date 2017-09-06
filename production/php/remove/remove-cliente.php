<?php include ("conecta.php");?>


<?php
    $id = $_GET["id"];
    $query = "delete from clientes where id=$id";
    if(mysqli_query($conexao, $query)){
    }else{
    }
    $query = "delete from prospeccao where id=$id";
    if(mysqli_query($conexao, $query)){
    }else{
    }
    mysqli_close($conexao);
    header("Location: clientes.php");
?>

<?php include "footer.php"?>