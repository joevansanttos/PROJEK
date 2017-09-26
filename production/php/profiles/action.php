<?php include "../bancos/conecta.php";?>

<?php  
//action.php

$input = filter_input_array(INPUT_POST);

$data_inicio= mysqli_real_escape_string($conexao, $input["data_inicio"]);
$data_fim = mysqli_real_escape_string($conexao, $input["data_fim"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE tarefas_contrato 
 SET data_inicio = '".$data_inicio."', 
 data_fim = '".$data_fim."' 
 WHERE id_tarefas_contrato = '".$input["id_tarefas_contrato"]."'
 ";

 mysqli_query($conexao, $query);

}


echo json_encode($input);

?>