<?php 
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-cidade.php";
  require_once "../bancos/banco-usuario.php";
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
  $query = "insert into usuarios (senha, nome, sobrenome, email, sexo, estado, cidade, id_profissao, telefone) values ('{$senha}','{$nome}', '{$sobrenome}', '{$email}' ,'{$sexo}','{$estado}','{$cidade}', {$id_profissao} ,'{$telefone}' )";

if(mysqli_query($conexao, $query)){
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false){
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));         

    $usuario = buscaUsuarioEmail($conexao , $email);
    $id_usuario= $usuario['id_usuario'];
    $query = "insert into profileimg (image, id_usuario) VALUES ('$imgContent', $id_usuario)";   
  }else{

  }
  mysqli_close($conexao);
  $_SESSION["success"] = "Usuario  $nome adicionado!";
  header("Location: ../usuarios/usuarios.php"); 
}


?>




