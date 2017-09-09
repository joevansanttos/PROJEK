<?php include "../bancos/conecta.php";?>
<?php include ("../bancos/banco-market.php");?>
<?php include ("../bancos/banco-lead.php");?>

<?php
$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$cargo = $_POST["cargo"];
$comentario = $_POST["comentario"];
$id_consultor = $_POST['id_consultor'];
$today = date("d.m.y");

$query = "insert into leads (id_clientes, nome, email, tel, cargo, comentario) values ('$id','{$nome}' ,'{$email}' ,'{$tel}' ,'{$cargo}' ,'{$comentario}')";

if(mysqli_query($conexao, $query)){
	$lead = buscaLead($conexao, $id, $nome, $email, $tel, $cargo, $comentario);
	$query = "insert into consultores_lead (id_consultor, id_lead, data) values ({$id_consultor}, {$lead['id_lead']},'{$today}')";
	mysqli_query($conexao, $query);
    $cliente = buscaCliente($conexao, $id);
    $query = "update market set id_type= 2 where id_market=$id";
    if(mysqli_query($conexao, $query)){
    	mysqli_close($conexao);
    	header("Location: ../empresas/leads.php");
    }
    
}else{
    echo "nao foi adicionado";
}
?>

