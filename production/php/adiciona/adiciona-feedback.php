<?php include "../bancos/conecta.php";?>

<?php
    $id_consultor = $_POST["id_consultor"];
    $id_contrato = $_POST["id_contrato"];
    $pontual = $_POST["pontual"];
    $conhecimento = $_POST["conhecimento"];
    $assiduo = $_POST["assiduo"];
    $empatia = $_POST["empatia"];

    $query = "insert into feedback (id_consultor, id_contrato, pontual, conhecimento, assiduo, empatia) values ({$id_consultor},{$id_contrato},{$pontual}, {$conhecimento}, {$assiduo}, {$empatia} )";

    if(mysqli_query($conexao, $query)){
        mysqli_close($conexao);
        header("Location: ../pos-venda/pos-venda.php");
    }else{
        echo "nao foi adicionado";
    }