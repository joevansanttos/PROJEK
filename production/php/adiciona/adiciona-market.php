<?php 
    require_once "../bancos/conecta.php";
    require_once "../bancos/banco-cidade.php";
    require_once "../bancos/banco-market.php";
    require_once "../bancos/banco-consultores-market.php";
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
    $id_consultor = $_POST['id_consultor'];
    $market = buscaMarketCnpj($conexao, $cnpj);
    if(empty($market)){
        adicionaMarket($conexao, $razao, $nome, $cnpj, $site,$endereco,$estado,$cidade,$segmento,$tel,$bairro,$id_porte);
        $market = buscaMarketCnpj($conexao, $cnpj);
        $id_market = $market['id_market'];
        $today = date("d.m.y");
        adicionaConsultoresMarket($conexao, $id_consultor, $id_market, $today);        
        mysqli_close($conexao);
        $_SESSION["success"] = "Market $nome adicionado!";
        header("Location: ../empresas/market.php");
    }else{
        $_SESSION["error"] = "Já existe market com esse CNPJ!";
        header("Location: ../empresas/market.php");
    }  


    
?>

