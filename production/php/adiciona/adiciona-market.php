<?php 
    require_once "../bancos/conecta.php";
    require_once "../bancos/banco-cidade.php";
    require_once "../bancos/banco-market.php";
    ob_start();
    session_start();
    $razao = $_POST["razao"];
    $nome = $_POST["nome"];
    $cnpj = $_POST["cnpj"];
    $site = $_POST["site"];
    $endereco = $_POST["endereco"];
    $estado = $_POST["estado1"];
    $cidade = $_POST["cidade1"];
    $segmento = $_POST["segmento"];
    $tel = $_POST["tel"];
    $bairro = $_POST["bairro"];
    $id_porte = $_POST["id_porte"];
    $query = "insert into market (razao, nome, cnpj, site, endereco, estado, cidade, segmento, tel,  bairro, id_porte) values ('{$razao}','{$nome}', '{$cnpj}' ,'{$site}', '{$endereco}'  ,'{$estado}','{$cidade}', '{$segmento}','{$tel}' ,'{$bairro}', $id_porte )";


    if(mysqli_query($conexao, $query)){
        $market = buscaMarketCnpj($conexao, $cnpj);
        $id_consultor = $_POST['id_consultor'];
        $today = date("d.m.y");
        $query = "insert into consultores_market (id_consultor, id_market, data) values ({$id_consultor}, {$market['id_market']},'{$today}')";
        if(mysqli_query($conexao, $query)){
            mysqli_close($conexao);
            $_SESSION["market_adicionado"] = "Market $nome adicionado!";
            header("Location: ../empresas/market.php");

        }        
    }else{
        echo mysqli_error($conexao);
    }


    
?>

