<?php 
   require_once "../bancos/conecta.php";
   ob_start();
   session_start(); 
   $id_market = $_GET["id_market"];
   $razao = $_GET["razao"];
   $nome = $_GET["nome"];
   $cnpj = $_GET["cnpj"];
   $site = $_GET["site"];
   $endereco = $_GET["endereco"];
   $estado = $_GET["estado1"];
   $cidade = $_GET["cidade1"];
   $segmento = $_GET["segmento"];
   $tel = $_GET["tel"];
   $bairro = $_GET["bairro"];
   $id_porte = $_GET["id_porte"];
   $query = "update  market  set nome ='{$nome}', razao = '{$razao}', cnpj ='{$cnpj}', site = '{$site}', endereco ='{$endereco}',estado ='{$estado}', cidade = '{$cidade}', segmento='{$segmento}', tel = '{$tel}', bairro='{$bairro}', id_porte = $id_porte where id_market = {$id_market}";

   if(mysqli_query($conexao, $query)){
     mysqli_close($conexao);
     $_SESSION["success"] = "Market $nome alterado";
     header("Location: ../empresas/market.php");
   }else{
   }
