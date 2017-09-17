<?php include ("../bancos/conecta.php");?>
<?php include "../bancos/banco-cidade.php";?>
<?php include "../bancos/banco-usuario.php";?>
<?php include "../logica/logica-usuario.php";?>

<?php
verificaUsuario();
?>

<?php
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
$nome_cidade = buscaCidade($conexao, $cidade);

$query = "insert into usuarios (senha, nome, sobrenome, email, sexo, estado, cidade, id_profissao, telefone) values ('{$senha}','{$nome}', '{$sobrenome}', '{$email}' ,'{$sexo}','{$estado}','{$nome_cidade['CT_NOME']}', {$id_profissao} ,'{$telefone}' )";

if(mysqli_query($conexao, $query)){
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false){
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));         

    $usuario = buscaUsuarioEmail($conexao , $email);
    $query = "insert into profileimg (image, id_usuario) VALUES ('$imgContent', 20)";
    mysqli_query($conexao,$query);
    mysqli_close($conexao);
  }else{

  }
}else{
  echo "nao foi adicionado";
}


?>




