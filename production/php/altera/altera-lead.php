<?php include "../bancos/conecta.php";?>
<?php include ("../bancos/banco-market.php");?>
<?php include ("../bancos/banco-lead.php");?>

<?php
$id_lead = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$cargo = $_POST["cargo"];
$comentario = $_POST["comentario"];
$today = date("d.m.y");

 $query = "update  leads  set nome ='{$nome}', email = '{$email}', tel ='{$tel}', cargo = '{$cargo}', comentario ='{$comentario}'  where id_lead = {$id_lead}";

if(mysqli_query($conexao, $query)){   
  mysqli_close($conexao);
  header("Location: ../empresas/leads.php");  
}else{
    echo "nao foi adicionado";
}
?>