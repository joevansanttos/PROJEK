<?php include "../bancos/conecta.php";?>
<?php include ("../bancos/banco-market.php");?>
<?php include ("../bancos/banco-suspect.php");?>


<?php
$id = $_POST["id"];
$contato = $_POST["contato"];
$data = $_POST["data"];
$status = $_POST["status"];
$hora = $_POST["hora"];
$consultor = $_POST["consultor"];
$comentario = $_POST["comentario"];

$query = "insert into suspects (id_clientes, contato, data, status, hora, comentario, consultor) values ('$id','{$contato}' ,'{$data}' ,'{$status}' ,'{$hora}' ,'{$comentario}', '{$consultor}')";

if(mysqli_query($conexao, $query)){
    $cliente = buscaCliente($conexao, $id);    
    mysqli_close($conexao);
    header("Location: ../empresas/suspects.php");
}else{
    echo "nao foi adicionado";
}
?>

