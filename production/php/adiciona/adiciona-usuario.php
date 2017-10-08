<?php 
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-cidade.php";
  require_once "../bancos/banco-usuario.php";
  require_once "../bancos/banco-imagem.php";
  require_once "../logica/logica-usuario.php";
  ob_start();
  session_start();
  verificaUsuario();
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $senha = md5($senha);
  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $sexo = $_POST["sexo"];
  $estado = $_POST["estado1"];
  $cidade = $_POST["cidade1"];
  $id_profissao = $_POST["profissao"];
  $telefone = $_POST["telefone"];
  adicionaUsuario($conexao, $senha, $nome, $sobrenome, $email, $sexo, $estado, $cidade, $id_profissao, $telefone);
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false){
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $usuario = buscaUsuarioEmail($conexao , $email);
    $id_usuario= $usuario['id_usuario'];
    adicionaImagem($conexao, $imgContent, $id_usuario);   
  }
  mysqli_close($conexao);
  $_SESSION["success"] = "Usuario  $nome adicionado!";
  header("Location: ../usuarios/usuarios.php"); 

?>




