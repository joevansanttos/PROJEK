<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-market.php";?>

<?php
$id = $_GET['id'];
$contrato = buscaContrato($conexao , $id);
$cliente= buscaMarket($conexao, $contrato['id_clientes']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Contrato</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src='.../../../vendors/jsPDF-1.3.2/dist/jspdf.min.js'></script>
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
      function genPDF(){
         var doc = new jsPDF();
         doc.setFontSize(11);
         doc.setFont("calibri");
         doc.setFontType("normal");
         doc.text(20, 20, 'CONTRATADA: PROJEK CONSULTORIA , inscrita no Cadastro Nacional de Pessoas Jurídicas sob o nº',);
         doc.text(30, 20, '20.959.483/0001-63, com sede RUA ALCEU AMOROSO LIMA Nº786, SALA 312, EDF. TANCREDO NEVES',);
         doc.save('Test.pdf');
      }
    </script>
</head>
   <a href="javascript:genPDF()">Download PDF</a>
</html>



   

