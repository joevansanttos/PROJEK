<?php include ("../bancos/conecta.php");?>

<?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $sexo = $_POST["sexo"];
    $estado = $_POST["estado1"];
    $cidade = $_POST["cidade1"];
    $id_profissao = $_POST["profissao"];
    $telefone = $_POST["telefone"];



    $query = "insert into usuarios (senha, nome, sobrenome, email, sexo, estado, cidade, id_profissao, telefone) values ('{$senha}','{$nome}', '{$sobrenome}', '{$email}' ,'{$sexo}','{$estado}','{$cidade}', {$id_profissao} ,'{$telefone}'   )";

    if(mysqli_query($conexao, $query)){
        mysqli_close($conexao);
        header("Location: ../usuarios/usuarios.php");
    }else{
        echo "nao foi adicionado";
    }

    
?>




