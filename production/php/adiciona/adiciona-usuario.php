<?php include ("../bancos/conecta.php");?>

<?php
    $email = $_GET["email"];
    $senha = $_GET["senha"];
    $nome = $_GET["nome"];
    $sexo = $_GET["sexo"];
    $estado = $_GET["estado1"];
    $cidade = $_GET["cidade1"];
    $id_profissao = $_GET["profissao"];
    $telefone = $_GET["telefone"];



    $query = "insert into usuarios (senha, nome, email, sexo, estado, cidade, id_profissao, telefone) values ('{$senha}','{$nome}','{$email}' ,'{$sexo}','{$estado}','{$cidade}', {$id_profissao} ,'{$telefone}'   )";

    if(mysqli_query($conexao, $query)){
        header("Location: ../usuarios/usuarios.php");
        echo "foi adicionado";
    }else{
        echo "nao foi adicionado";
    }


    mysqli_close($conexao);
?>




