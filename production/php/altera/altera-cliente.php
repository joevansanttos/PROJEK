<?php include ("cabecalho.php");?>
<?php include ("conecta.php");?>
<?php include ("banco-clientes.php");?>

<?php
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
   $comentario = $_GET["comentario"];

if(alteraCliente($conexao, $razao, $nome, $cnpj, $site, $endereco, $estado, $cidade, $segmento, $tel, $bairro, $comentario)){?>
    <p class="alert-success">O produto foi alterado</p>
<?php }else{
    $msg = mysqli_error($conexao);
?>
    <p class="alert-danger">O produto nao foi alterado</p>
<?php
}   
?>

<?php include "footer.php"?>