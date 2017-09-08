<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-prospect.php";?>


<?php
$id = $_POST["id"];
$prod = $_POST["prod"];
$prob = $_POST["prob"];
$valor_op = $_POST["valor_op"];
$valor_est = $_POST["valor_est"];
$recebimento = $_POST["recebimento"];
$fechamento = $_POST["fechamento"];

$query = "insert into prospects (id_clientes, prob, id_produto, valor_op, valor_est, recebimento, fechamento) values ($id,	$prob ,	$prod ,	$valor_op ,	$valor_est ,'{$recebimento}', '{$fechamento}')";

if(mysqli_query($conexao, $query)){
    $cliente = buscaCliente($conexao, $id);
    mysqli_close($conexao);
    header("Location: ../empresas/prospects.php");
}else{
    echo "nao foi adicionado";
}

?>

