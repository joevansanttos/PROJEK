<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-cidade.php";?>

<?php
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
    $comentario = $_POST["comentario"];

    $nome_cidade = buscaCidade($conexao, $cidade);

    $query = "insert into market (razao, nome, cnpj, site, endereco, estado, cidade, segmento, tel, comentario, bairro, id_type) values ('{$razao}','{$nome}', '{$cnpj}' ,'{$site}', '{$endereco}'  ,'{$estado}','{$nome_cidade['CT_NOME']}', '{$segmento}','{$tel}' ,'{$comentario}',  '{$bairro}', 1 )";

    if(mysqli_query($conexao, $query)){
        mysqli_close($conexao);
        header("Location: ../empresas/market.php");
    }else{
    }


    
?>

