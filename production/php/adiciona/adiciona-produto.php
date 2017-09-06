<?php include ("conecta.php");?>
<?php include ("banco-produto.php");?>

<?php
    $nome = $_GET["nome"];
    $descricao = $_GET["descricao"];
    $beneficios = $_GET["beneficios"];
    $entregas = $_GET["entregas"];
    $preco = $_GET["preco"];

    $query = "insert into produtos (nome, descricao, beneficios, entregas, preco) values ('{$nome}','{$descricao}','{$beneficios}','{$entregas}', '{$preco}')";

    if(mysqli_query($conexao, $query)){
        echo "foi adicionado";
    }else{
        echo "nao foi adicionado";
    }


    mysqli_close($conexao);
    header("Location: produtos.php");
?>