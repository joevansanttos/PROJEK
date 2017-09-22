<?php include "../bancos/conecta.php";?>
<?php
if($input['action'] === 'edit'){
	$id_tarefas_contrato = $input['id_tarefas_contrato'];
	$query = "update tarefas_contrato set data_inicio = '{$data_inicio}' where id_tarefas_contrato = $id_tarefas_contrato";
	mysqli_query($conexao, $query);
}