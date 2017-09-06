<?php include "../bancos/conecta.php";?>
<?php include ("../bancos/banco-market.php");?>
<?php include ("../bancos/banco-suspect.php");?>


<?php
$id = $_GET["id"];
$contato = $_GET["contato"];
$data = $_GET["data"];
$status = $_GET["status"];
$hora = $_GET["hora"];
$consultor = $_GET["consultor"];
$comentario = $_GET["comentario"];

$query = "insert into suspects (id_clientes, contato, data, status, hora, comentario, consultor) values ('$id','{$contato}' ,'{$data}' ,'{$status}' ,'{$hora}' ,'{$comentario}', '{$consultor}')";

if(mysqli_query($conexao, $query)){
    $cliente = buscaCliente($conexao, $id);
    $query = "update market set id_type= 3 where id=$id";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("Location: ../empresas/suspects.php");
}else{
    echo "nao foi adicionado";
}
?>

