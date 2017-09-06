<?php include "../bancos/conecta.php";?>

<?php
    $id_consultor = $_GET["id_consultor"];
    $id_contrato = $_GET["id_contrato"];
    $pontual = $_GET["pontual"];
    $conhecimento = $_GET["conhecimento"];
    $assiduo = $_GET["assiduo"];
    $empatia = $_GET["empatia"];

    $query = "insert into feedback (id_consultor, id_contrato, pontual, conhecimento, assiduo, empatia) values ({$id_consultor},{$id_contrato},{$pontual}, {$conhecimento}, {$assiduo}, {$empatia} )";

    if(mysqli_query($conexao, $query)){
        header("Location: ../pos-venda/pos-venda.php");
    }else{
        echo "nao foi adicionado";
    }