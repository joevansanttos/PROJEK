<?php include "../bancos/conecta.php";?>

<?php
    $razao = $_GET["razao"];
    $nome = $_GET["nome"];
    $fantasia = $_GET["fantasia"];
    $cnpj = $_GET["cnpj"];
    $site = $_GET["site"];
    $endereco = $_GET["endereco"];
    $estado = $_GET["estado1"];
    $cidade = $_GET["cidade1"];
    $segmento = $_GET["segmento"];
    $tel = $_GET["tel"];
    $bairro = $_GET["bairro"];
    $comentario = $_GET["comentario"];


    $query = "insert into market (razao, nome,fantasia, cnpj, site, endereco, estado, cidade, segmento, tel, comentario, bairro, id_type) values ('{$razao}','{$nome}','{$fantasia}','{$cnpj}' ,'{$site}', '{$endereco}'  ,'{$estado}','{$cidade}', '{$segmento}','{$tel}' ,'{$comentario}',  '{$bairro}', 1 )";

    if(mysqli_query($conexao, $query)){
        header("Location: ../empresas/market.php");
    }else{
    }


    mysqli_close($conexao);
?>

<?php include "footer.php"?>
