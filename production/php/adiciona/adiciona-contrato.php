<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-socio.php";?>
<?php include "../bancos/banco-departamentos.php";?>

<?php 
   
   $id_prospect = $_GET['id_prospect'];
   $n_contrato = $_GET['n_contrato'];
   $id_cliente = $_GET['id_cliente'];
   $razao = $_GET['razao'];
   $cnpj = $_GET['cnpj'];   
   $sede = $_GET['sede'];  
   $id_produto = $_GET['id_produto'];
   $id_consultor = $_GET['id_consultor'];
   $data_inicio = $_GET['data_inicio'];
   $date = new DateTime($data_inicio);
   $data_inicio = $date->format('d.m.Y');

   $data_fim = $_GET['data_fim'];
   $date = new DateTime($data_fim);
   $data_fim = $date->format('d.m.Y');

   $socios = $_GET['multiple'];
   $cpfs = $_GET['cpf'];
   $residencias = $_GET['residencia'];
   $nacionalidades = $_GET['nacionalidade'];
   $profissoes = $_GET['profissao'];
   $civis = $_GET['civil'];

   $departamentos = $_GET['my-select']; 
   
   

   $query = "insert into contratos (n_contrato, id_clientes, razao,  cnpj, sede, data_inicio, data_fim, id_consultor, id_produto, id_contrato_status, id_prospect) values ('{$n_contrato}', $id_cliente, '{$razao}', '{$cnpj}','{$sede}', '{$data_inicio}','{$data_fim}' ,$id_consultor,  $id_produto, 1, $id_prospect)";

   if(mysqli_query($conexao, $query)){
      $contrato = buscaContratoNumero($conexao, $n_contrato);
      $n_contrato = $contrato['n_contrato'];
      $i = 0;
      $size = count($departamentos);
      while ($i < $size) {
         $query = "insert into departamentos_contratos (id_departamento, n_contrato) values ($departamentos[$i], '{$n_contrato}')" ;
         mysqli_query($conexao, $query);
         $i++;
      }

      $i = 0;
      $size = count($socios);
      while ($i < $size) {
         $query = "insert into socios (nome, cpf, residencia, nacionalidade, profissao, civil, n_contrato ) values ('$socios[$i]', '$cpfs[$i]', '$residencias[$i]', '$nacionalidades[$i]', '$profissoes[$i]', '$civis[$i]', '{$n_contrato}' 
         )" ;
         if(mysqli_query($conexao, $query)){
            
         }else{
            echo mysqli_error($conexao);
         }
         $i++;
      }
      header("Location: ../contratos/contratos.php"); 
   }else{
      echo mysqli_error($conexao);
      echo "nao foi adicionado";
   }
   exit;

 ?>   
