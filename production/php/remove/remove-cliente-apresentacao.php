<?php include ("conecta.php");?>
<?php include ("banco-clientes-apresentacao.php");?>
<?php include ("banco-clientes-prospeccao.php");?>
<?php include ("banco-clientes-oportunidade.php");?>


<?php
    $id = $_GET["id"];
    $apresentacao = buscaApresentacao($conexao, $id);
    $cliente = buscaCliente($conexao, $apresentacao['id_cliente']);
    $query = "delete from apresentacao where id=$id";
    if(mysqli_query($conexao, $query)){
        $prospeccoes = buscaClientesProspeccao($conexao, $cliente['id']);
        $tam_p = count($aprospeccoes);
        if($tam_p > 0){
            $cliente['status'] = 'prospeccao';
        }
        $apresentacoes = buscaClientesApresentacao($conexao, $cliente['id']);
        $tam_a = count($apresentacoes);
        if($tam_a > 0){
            $cliente['status'] = 'apresentacao';
        }
        $oportunidades = buscaClientesOportunidades($conexao, $cliente['id']);
        $tam_o = count($oportunidades);
        if($tam_o > 0){
            $cliente['status'] = 'oportunidade';
        }
    }else{
    }
    mysqli_close($conexao);
    header("Location: cliente-profile.php?id=$id");
?>

<?php include "footer.php"?>