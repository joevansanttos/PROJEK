<?php 
  ob_start();
  session_start();
  require_once "../bancos/conecta.php";
  $data = $_POST["data"];
  $date = new DateTime($data);
  $data = $date->format('d.m.Y');
  $descricao = $_POST["descricao"];
  $valor = $_POST["valor"];
  $id_categoria = $_POST["id_categoria"];
  $id_pagamento = $_POST["id_pagamento"];
  $id_cliente = $_POST["id_cliente"];
  $id_pago = 1;
  $query = "insert into recebimentos (id_cliente, data, descricao, valor, id_categoria, id_pagamento, id_pago) values ({$id_cliente}, '{$data}','{$descricao}' ,{$valor} ,{$id_categoria} ,{$id_pagamento}, {$id_pago})";
  mysqli_query($conexao, $query);
  header("Location: ../financeiro/transacoes.php");
?>

