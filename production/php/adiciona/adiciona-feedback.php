<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-feedback.php";?>

<?php
    $id_consultor = $_POST["id_consultor"];
    $id_contrato = $_POST["id_contrato"];
    $id_clientes = $_POST["id_clientes"];
    $pontual = $_POST["pontual"];
    $conhecimento = $_POST["conhecimento"];
    $assiduo = $_POST["assiduo"];
    $empatia = $_POST["empatia"];

    $query = "insert into feedback (id_consultor, id_contrato, id_clientes, pontual, conhecimento, assiduo, empatia) values ({$id_consultor},{$id_contrato}, {$id_clientes}, {$pontual}, {$conhecimento}, {$assiduo}, {$empatia} )";

    if(mysqli_query($conexao, $query)){
        $feedback = buscaContratoFeedback($conexao, $id_contrato);
        $id_feedback = $feedback['id_feedback'];
        $query = "update pos_venda set id_feedback = $id_feedback where id_contrato = $id_contrato";
        if(mysqli_query($conexao, $query)){
            mysqli_close($conexao);
         header("Location: ../pos-venda/pos-venda.php");
        }else{
            mysqli_error($conexao);
        }
        
    }else{
        mysqli_error($conexao);
    }