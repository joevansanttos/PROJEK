<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-produto.php";?>

<?php
    $nome = $_GET["nome"];
    $descricao = $_GET["descricao"];
    $beneficios = $_GET["beneficios"];
    $entregas = $_GET["entregas"];
    $preco = $_GET["preco"];
    $id_produto = $_GET["id_produto"];

    $query = "update  produtos  set nome ='{$nome}', descricao = '{$descricao}', beneficios ='{$beneficios}', entregas = '{$entregas}', preco ='{$preco}'  where id_produto = {$id_produto}";

    if(mysqli_query($conexao, $query)){
      mysqli_close($conexao);
      header("Location: ../produtos/produtos.php");
    }else{
    }


     
?>

