<?php
	/* Chama os arquivos de conexão ao BD */    
    include_once ("conecta.php"); 

    /* "Pega" os dados digitados no formulário, através do método POST */
	echo "<br>Seu login é: ". $_POST["login"];
	echo "<br>Sua senha é:". $_POST["senha"];
	echo "<br>Seu nome é:". $_POST["name"];
	echo "<br>Seu email é:". $_POST["email"];
	echo "<br>Seu sexo é:". $_POST["sexo"];
	echo "<br>Seu estado é:". $_POST["estado1"];
	echo "<br>Sua cidade é:". $_POST["cidade1"];
/*Inserindo os dados na Tabela "dados_usuarios" através de comandos MySQL. */
$sqlinsert = "INSERT INTO dados_usuarios (login,senha,name,email,sexo,estado1,cidade1) VALUES ('','$login','$senha','$name','$email','$sexo','$estado1','$cidade1')";
    
    $insercao = mysql_connect ($sqlinsert) or die ("Não foi possível inserir os dados");
?>
