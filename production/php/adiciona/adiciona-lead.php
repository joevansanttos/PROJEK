<?php 
  ob_start();
  session_start();
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-market.php";
  require_once "../bancos/banco-lead.php";
  require_once "../bancos/banco-historico.php";
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $tel = $_POST["tel"];
  $cargo = $_POST["cargo"];
  $id_consultor = $_POST['id_consultor'];
  $comentario = $_POST['comentario'];
  $today = date("d.m.y");
  $query = "insert into leads (id_clientes, nome, email, tel, cargo) values ('$id','{$nome}' ,'{$email}' ,'{$tel}' ,'{$cargo}')";

  if(mysqli_query($conexao, $query)){
	 $lead = buscaLead($conexao, $id, $nome, $email, $tel, $cargo, $comentario);
	  $query = "insert into consultores_lead (id_consultor, id_lead, data) values ({$id_consultor}, {$lead['id_lead']},'{$today}')";
    if(mysqli_query($conexao, $query)){
      $query = "insert into historico (id_market, id_consultor, comentario, data) values ($id, {$id_consultor} ,'{$comentario}' ,'{$today}')";
      mysqli_query($conexao, $query);
    	mysqli_close($conexao);
      $_SESSION["success"] = "Lead $nome adicionado!";
    	header("Location: ../empresas/leads.php");
    }
    
  }else{
    echo "nao foi adicionado";
  }
?>

