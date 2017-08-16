<?PHP

/* Arquivo de coenexão com o banco de dados */


$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "";

$conexao = mysqli_connect('localhost', 'root', '', 'projek');

$db = mysql_select_db($banco,$conexao) or die("Erro ao conectar ao bando de dados");


/*para fechar uma conexao com o banco utilizade a função mysql_close($conexao); */


?>