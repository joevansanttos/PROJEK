<?php include "cabecalho.php"?>


<?php
    $login = $_GET["login"];
    $senha = $_GET["senha"];
    $nome = $_GET["name"];
    $email = $_GET["email"];
    $sexo = $_GET["sexo"];
    $estado = $_GET["estado1"];
    $cidade = $_GET["cidade1"];

    $conexao = mysqli_connect('localhost', 'root', '', 'projek');



    $query = "insert into usuarios (login, senha, nome, email, sexo, estado, cidade) values ('{$login}','{$senha}','{$nome}','{$email}' ,'{$sexo}','{$estado}','{$cidade}')";

    if(mysqli_query($conexao, $query)){
        echo "foi adicionado";
    }else{
        echo "nao foi adicionado";
    }


    mysqli_close($conexao);

?>

<?php include "footer.php"?>



