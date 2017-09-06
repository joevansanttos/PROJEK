<?php include ("cabecalho.php");?>
<?php include ("content.php"); ?>
<?php include ("conecta.php");?>
<?php include ("banco-contrato.php");

?>

 <h1>Listagem de Contratos de Auditoria</h1>
 <a class="btn btn-primary" style="float: right;" href="form-contrato-auditoria.php?">Novo Contrato</a>
 </div>
 <div class="x_content">
<table class="table table-striped table-bordered">
  <tr>
    <th>Empresa</th>
    <th>Nome</th>
    <th>CNPJ</th>
    <th>Administrador</th>
  </tr>
  <?php
    $contratos = listaContratos($conexao);
    foreach ($contratos as $contrato){
      if($contrato['produto']=='auditoria'){
  ?>
    <tr>
      <td><?=$contrato['empresa']?></td>
      <td><?=$contrato['nome']?></td>
      <td><?=$contrato['cnpj']?></td>
      <td><?=$contrato['administrador']?></td>
    </tr>
  <?php
    }
    }
  ?>
</table>

<?php include ("footer.php");?>             