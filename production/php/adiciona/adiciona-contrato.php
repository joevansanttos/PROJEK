<?php 
   require_once "../bancos/conecta.php";
   require_once "../bancos/banco-contrato.php";
   require_once "../bancos/banco-socio.php";
   require_once "../bancos/banco-projeto.php";
   require_once "../bancos/banco-departamentos.php";
   require_once "../bancos/banco-departamentos-contrato.php";
   require_once "../bancos/banco-prospect.php";
   ob_start();
   session_start();
   $id_prospect = $_GET['id_prospect'];
   $prospect = buscaProspectId($conexao, $id_prospect);
   $id_cliente = $prospect['id_clientes'];
   $n_contrato = $_GET['n_contrato'];
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
   adicionaContrato($conexao, $n_contrato, $id_cliente, $razao, $cnpj, $sede, $data_inicio, $data_fim, $id_consultor, $id_produto, $id_prospect);
   $contrato = buscaContratoNumero($conexao, $n_contrato);
   adicionaProjeto($conexao, $n_contrato);
   $projeto = buscaProjetoContrato($conexao, $n_contrato);
   $i = 0;
   $size = count($departamentos);
   while ($i < $size) {
      $id_departamento = $departamentos[$i];
      adicionaDepartamentoContrato($conexao, $id_departamento, $projeto['id_projeto']);
      $i++;
   }
   $i = 0;
   $size = count($socios);
   while ($i < $size) {
      $socio = $socios[$i];
      $cpf = $cpfs[$i];
      $residencia = $residencias[$i];
      $nacionalidade = $nacionalidades[$i];
      $profissao = $profissoes[$i];
      $civil = $civis[$i];
      adicionaSocio($conexao, $socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $n_contrato);
      $i++;
   }
   mysqli_close($conexao);
   $_SESSION["success"] = "Contrato adicionado!";
   header("Location: ../contratos/contratos.php");    
   exit;


 ?>   
