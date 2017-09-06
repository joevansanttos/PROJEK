<?php include ("conecta.php");?>
<?php include ("banco-contrato.php");?>

<?php 
   
   $n_contrato = $_GET['n_contrato'];
   $empresa = $_GET['nome'];
   $fantasia = $_GET['fantasia'];
   $cnpj = $_GET['cnpj'];
   $sede = $_GET['sede'];  
   $administrador = $_GET['administrador'];
   $cpf = $_GET['cpf'];
   $residencia = $_GET['residencia'];   
   $data_inicio = $_GET['data_inicio'];
   $data_fim = $_GET['data_fim'];
   $id_consultor = $_GET['id_consultor'];
   $id_cliente = $_GET['id_cliente'];
   $id_produto = $_GET['id_produto'];
   
   $query = "insert into contratos (n_contrato, empresa, fantasia, cnpj, administrador, cpf, residencia, sede, data_inicio, data_fim, id_consultor, id_clientes, id_produto, status) values ('{$n_contrato}','{$empresa}','{$fantasia}' ,'{$cnpj}' ,'{$administrador}', '{$cpf}'  ,'{$residencia}','{$sede}', '{$data_inicio}','{$data_fim}' ,$id_consultor, $id_cliente, $id_produto, 'inicial')";

   if(mysqli_query($conexao, $query)){
      header("Location: contratos.php");
   }else{
      echo mysqli_error($conexao);
      echo "nao foi adicionado";
   }


   mysqli_close($conexao);
   

   exit;
 ?>   
