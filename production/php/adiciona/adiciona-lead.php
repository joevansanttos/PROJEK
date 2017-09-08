<?php include "../bancos/conecta.php";?>
<?php include ("../bancos/banco-market.php");?>

<?php
$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$cargo = $_POST["cargo"];
$comentario = $_POST["comentario"];

$query = "insert into leads (id_clientes, nome, email, tel, cargo, comentario) values ('$id','{$nome}' ,'{$email}' ,'{$tel}' ,'{$cargo}' ,'{$comentario}')";

if(mysqli_query($conexao, $query)){
    $cliente = buscaCliente($conexao, $id);
    $query = "update market set id_type= 2 where id=$id";
    if(mysqli_query($conexao, $query)){
    	mysqli_close($conexao);
    	header("Location: ../empresas/leads.php");
    }
    
}else{
    echo "nao foi adicionado";
}
?>

