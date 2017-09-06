<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-prospect.php";?>


<?php
$id = $_GET["id"];
$prod = $_GET["prod"];
$prob = $_GET["prob"];
$valor_op = $_GET["valor_op"];
$valor_est = $_GET["valor_est"];
$recebimento = $_GET["recebimento"];
$fechamento = $_GET["fechamento"];

$query = "insert into prospects (id_clientes, prob, id_produto, valor_op, valor_est, recebimento, fechamento) values ($id,	$prob ,	$prod ,	$valor_op ,	$valor_est ,'{$recebimento}', '{$fechamento}')";

if(mysqli_query($conexao, $query)){
    $cliente = buscaCliente($conexao, $id);
    $query = "update market set id_type= 3 where id=$id";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("Location: ../empresas/prospects.php");

}else{
    echo "nao foi adicionado";
}

?>

