<?php
/* Chama os arquivos de conexão ao BD */    
    include_once ("conecta.php"); 

    /* "Pega" os dados digitados no formulário, através do método POST */

echo "<br>Sua razão Social é: ". $_POST["razao"];
echo "<br> Seu Nome Fantasia é: ". $_POST["name"];
echo "<br> Seu CNPJ é: ". $_POST["cnpj"];
echo "<br> Seu site é:". $_POST["website"];
echo "<br> Seu Endereço é:". $_POST["end"];
echo "<br> Seu Estado é:". $_POST["estado1"];
echo "<br> Sua Cidade é:". $_POST["cidade1"];
echo "<br> Sua Atividade da Empresa é:". $_POST["ativ"];
echo "<br> Seu telefone é". $_POST["telefone"];
echo "<br> Seu comentário é:". $_POST["textarea"];
echo "<br> Seu contato é:". $_POST["contato"];
echo "<br> Seu cargo é:". $_POST["cargo"];
echo "<br> Seu contato para apresentação é:". $_POST["contato1"];
echo "<br> A data para apresentação é:". $_POST["date"];
echo "<br> Seu status para apresentação é:". $_POST["status"];
echo "<br> A hora da apresentação é:". $_POST["hora"];
echo "<br> Seu Produto é:". $_POST["prod"];
echo "<br> A Probabilidade é:". $_POST["prob"];
echo "<br> O Valor de Oportunidade é:". $_POST["opor"];
echo "<br> O Valor Estimado é:". $_POST["est"];
echo "<br> A data de Recebimento é:". $_POST["receb"];
echo "<br> A data de fechamento é:". $_POST["fecha"];
	
/*Inserindo os dados na Tabela "dados_clientes" através de comandos MySQL. */
$sqlinsert = "INSERT INTO dados_clientes (razao,name,cnpj,website,end,estado1,cidade1,ativ,telefone,textarea,contato,cargo,contato1,date,status,hora,prod,prob,opor,est,receb,fecha) VALUES ('','$razao','$name','$cnpj','$website','$end','$estado1','$cidade1','$ativ','$telefone','$textarea','$contato','$cargo','$contato1','$date','$status','$hora','$prob','$opor','$est','$receb','$fecha')";
    
    $insercao = mysql_connect ($sqlinsert) or die ("Não foi possível inserir os dados");
    
        
?>
