<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>

<?php 
   
   $n_contrato = $_POST['n_contrato'];
   $empresa = $_POST['nome'];
   $fantasia = $_POST['fantasia'];
   $cnpj = $_POST['cnpj'];
   $sede = $_POST['sede'];  
   $administrador = $_POST['administrador'];
   $cpf = $_POST['cpf'];
   $residencia = $_POST['residencia'];   
   $data_inicio = $_POST['data_inicio'];
   $data_fim = $_POST['data_fim'];
   $id_consultor = $_POST['id_consultor'];
   $id_cliente = $_POST['id_cliente'];
   $id_produto = $_POST['id_produto'];
   
   $query = "insert into contratos (n_contrato, empresa, fantasia, cnpj, administrador, cpf, residencia, sede, data_inicio, data_fim, id_consultor, id_clientes, id_produto, status) values ('{$n_contrato}','{$empresa}','{$fantasia}' ,'{$cnpj}' ,'{$administrador}', '{$cpf}'  ,'{$residencia}','{$sede}', '{$data_inicio}','{$data_fim}' ,$id_consultor, $id_cliente, $id_produto, 'inicial')";

   if(mysqli_query($conexao, $query)){
      mysqli_close($conexao);

      header("Location: ../contratos/contratos.php");
   }else{
      echo mysqli_error($conexao);
      echo "nao foi adicionado";
   }
   exit;
 ?>   
