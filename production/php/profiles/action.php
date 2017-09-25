<?php include "../bancos/conecta.php";?>
<?php
header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);
$first_name = mysqli_real_escape_string($connect, $input["first_name"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);
if($input['action'] === 'edit'){
	$query = "update tarefas_contrato set data_inicio = '{$data_inicio}' where id_tarefas_contrato = $id_tarefas_contrato";
	mysqli_query($conexao, $query);
}