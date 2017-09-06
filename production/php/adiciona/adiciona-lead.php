<?php include "../bancos/conecta.php";?>
<?php include ("../bancos/banco-market.php");?>

<?php
$id = $_GET["id"];
$nome = $_GET["nome"];
$email = $_GET["email"];
$tel = $_GET["tel"];
$cargo = $_GET["cargo"];
$comentario = $_GET["comentario"];

$query = "insert into leads (id_clientes, nome, email, tel, cargo, comentario) values ('$id','{$nome}' ,'{$email}' ,'{$tel}' ,'{$cargo}' ,'{$comentario}')";

if(mysqli_query($conexao, $query)){
    $cliente = buscaCliente($conexao, $id);
    $query = "update market set id_type= 2 where id=$id";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("Location: ../empresas/leads.php");
}else{
    echo "nao foi adicionado";
}
?>

