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
$date = new DateTime($recebimento);
$recebimento = $date->format('d.m.Y');
$fechamento = $_POST["fechamento"];
$date = new DateTime($fechamento);
$fechamento = $date->format('d.m.Y');
$id_consultor = $_POST["id_consultor"];
$today = date("d.m.y");

$query = "insert into prospects (id_clientes, prob, id_produto, valor_op, valor_est, recebimento, fechamento, id_consultor) values ($id,	$prob ,	$prod ,	$valor_op ,	$valor_est ,'{$recebimento}', '{$fechamento}' ,	$id_consultor)";

if(mysqli_query($conexao, $query)){
    $prospect = buscaProspect($conexao, $id, $prod, $valor_op);
    $query = "insert into consultores_prospect (id_consultor, id_prospect, data) values ({$id_consultor}, {$prospect['id_prospect']},'{$today}')";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("Location: ../empresas/prospects.php");
}else{
    echo "nao foi adicionado";
}

?>

