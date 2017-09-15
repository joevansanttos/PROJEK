<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-socio.php";?>
<?php include "../bancos/banco-departamentos-contrato.php";?>
<?php include "../bancos/banco-departamentos.php";?>

<?php
$id = $_GET['id'];
$today = date("d.m.Y");
$todayPieces = explode(".", $today);
$contrato = buscaContrato($conexao , $id);
$departamentos =[];
$departamentosContrato = buscaDepartamentosContrato($conexao, $contrato['id_contrato']);
foreach ($departamentosContrato as  $dep) {
  $departamento = buscaDepartamento($conexao, $dep['id_departamento']);
  array_push($departamentos, $departamento[0]['descricao'] );
}
$cliente= buscaMarket($conexao, $contrato['id_clientes']);
$socios = buscaSociosContrato($conexao, $contrato['id_contrato']);


$inicio = $contrato['data_inicio'];
$pieces = explode(".", $inicio);
$fim = $contrato['data_fim'];
$pieces2 = explode(".", $fim);
$plano =[];
$end[0] = intval($pieces2[1]);
$end[1] = intval($pieces2[2][2].$pieces2[2][3]);
$begin[0] = intval($pieces[1]);
$begin[1] = intval($pieces[2][2].$pieces[2][3]);

while($begin[0] != $end[0] || $begin[1] != $end[1]){
  if($begin[0]== 12){
    $begin0 = (string)$begin[0];
    $begin1 = (string)$begin[1];
    $mes = 'Dezembro'.'/'.$begin1;
    array_push($plano, $mes);
    $begin[0]=1;
    $begin[1] =  $begin[1] + 1;
  }else{
    $begin0 = (string)$begin[0];
    $begin1 = (string)$begin[1];
    switch ($begin0) {
      case '1':
        $begin0 = 'Janeiro';
        break;
      case '2':
        $begin0 = 'Fevereiro';
        break;
      case '3':
        $begin0 = 'Março';
        break;
      case '4':
        $begin0 = 'Abril';
        break;
      case '5':
        $begin0 = 'Maio';
        break;
      case '6':
        $begin0 = 'Junho';
        break;
      case '7':
        $begin0 = 'Julho';
        break;
      case '8':
        $begin0 = 'Agosto';
        break;
      case '9':
        $begin0 = 'Setembro';
        break;      
      case '10':
        $begin0 = 'Outubro';
        break;
      case '11':
        $begin0 = 'Novembro';
        break;    
      
      default:
        # code...
        break;
    }
    $mes = $begin0.'/'.$begin1; 
    array_push($plano, $mes);
    $begin[0] = $begin[0] + 1;
  }
}

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
      
    </script>
    <style type="text/css">
        body {
         }


         p{
            text-align: justify;
            font-size: 11pt;
            font-family: Calibri;
            display: inline;
            
         }

         div {
             text-align: justify;
             text-justify: inter-word;
         }

         h1{
             font-size: 16pt;
            font-family: Calibri;
         }

         h2{
             font-size: 18pt;
            font-family: Calibri;
         }
         
         div {
           background-color: white;
           padding: 50px;
           margin: 10px;
         }
         
         button {
           background-color: #44c767;
           -moz-border-radius: 28px;
           -webkit-border-radius: 28px;
           border-radius: 28px;
           border: 1px solid #18ab29;
           display: inline-block;
           cursor: pointer;
           color: #ffffff;
           font-family: Arial;
           font-size: 17px;
           padding: 16px 31px;
           text-decoration: none;
           text-shadow: 0px 1px 0px #2f6627;
         }
         
         button:active {
           position: relative;
           top: 1px;
         }

         p{
            

         }

         table, th, td {
             border: 1px solid black;
             border-collapse: collapse;

         }
         th, td {
             padding: 5px;
             text-align: left;
         }

    </style>
</head>
<body >
    <div id="conteudo">    
      <span class="section"><h1><center>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</center></h1>                
      <br>
            <center><h2><?=$contrato['data_inicio']?></h2> </center>
      <br>
      <p>Por este instrumento particular, as Partes adiante identificadas e qualificadas, a saber:</p><br><br> 

      <p><strong>CONTRATADA:</strong> PROJEK CONSULTORIA , inscrita no Cadastro Nacional de Pessoas Jurídicas sob o nº 23.913.067/0001-12, com sede RUA ALCEU AMOROSO LIMA Nº786, SALA 312, EDF. TANCREDO NEVES TRADE CENTER,  SALVADOR – BA. Tel: 71 3039-9780, neste ato representada pelo seu administrador, Sr. Fábio Martins da Silva, RG: 4978785-34, residente na Rua Salgueiro, 455, Apto. 2101, Condomínio ATMOS – Greenville, Torre Átria, Patamares, Salvador – Ba.</p><br><br>

      <p><strong>CONTRATANTE:</strong> <?=$cliente['razao']?> , Nome Fantasia <?=$cliente['nome']?>, pessoa jurídica de direito privado, inscrita no Cadastro Nacional de Pessoas Jurídicas sob nº CNPJ Nº <?=$cliente['cnpj']?>, com sede na <?=$contrato['sede']?>,neste ato representada pelo seu administrador,</p>

      <?php
       foreach ($socios as $key => $socio) {
      ?>
       <p><?=$socio['nome']?>, brasileiro, empresário, casado CPF nº <?=$socio['cpf']?>,  residente em <?=$socio['residencia']?>.</p>
      <?php   # code...
       }
      ?>
      
      <p>Considerando que a Contratada está disposta a prestar os serviços a seguir enumerados e definidos à Contratante, e que esta está disposta a remunerar tais serviços de acordo com as condições também a seguir estipuladas, </p><br><br>  


      <p><center><strong>RESOLVEM</strong></center></p><br>
      
      <p><strong>Cláusula I – Do objeto</strong><br> 
        A <strong>Contratada</strong> se compromete a aplicar a Plataforma de Treinamento EAD, baseado em um sistema de gestão de aprendizagem, desenvolvido a partir de uma metodologia pedagógica para promover o ensino online de forma eficiente e bem estruturada.<br>
        §1 – O produto da Plataforma EAD está descrito abaixo:<br>
       <strong>Cursos online personalizados</strong> – Nos cursos online estão disponíveis um ambiente de sala de aula virtual personalizado, para o colaborador aprender e aperfeiçoar conhecimentos de forma simples e lúdica através de slides sincronizados com explicações de profissionais qualificados.<br>
       <strong>Exercícios de fixação:</strong> Para uma aprendizagem mais eficiente o aluno poderá realizar, ao longo das aulas exercícios para uma melhor memorização do conteúdo. <br>

       <strong>Avalições com diferentes tipos de questões –</strong> Após a conclusão de cada curso o colaborador poderá testar seus conhecimentos a fim de avaliar se o aprendizado foi realmente eficiente.<br>
       <strong>Certificação automatizada – </strong> Após a conclusão dos cursos e aprovação com média suficiente na avaliação, o colaborador sairá certificado, comprovando assim o conhecimento obtido.</p><br>

        <br><p><center><strong>AULAS POR DEPARTAMENTO</strong></center></p><br>
        <table align="center">
             <?php
              foreach ($departamentos as  $d) {
            ?>
            <tr>
               <th><?=$d?></th>
               <td>40 h</td> 
            </tr>
                 
                    
                <?php
                  }
                 ?>
            
        </table>
        
        </br>
        </br>
        </br>

        <p>§2 – As partes dão de acordo no cronograma de trabalho abaixo que irá nortear as atividades de consultoria.</p><br>  
        
        <center><p><br><strong>Plano de Trabalho –   2017 / 2018</strong></p></center><br>
        <table align="center">
            <?php
               foreach ($plano as  $value) {
             ?>
                <tr>
                    <th><center><p><?=$value?></p></center></th>
                    <td>40 h</td>
                </tr>
               
             <?php
               }
            ?> 
        </table>
        

       <br><p><strong>Cláusula II - Do prazo</strong><br> 
       Os serviços a que se refere a cláusula antecedente serão realizados e postos à disposição da Contratante a partir de 1 de Julho de 2017 a 1 de Julho de 2018.</p><br><br>

       <p><strong>Cláusula III - Da remuneração</strong><br> 
       A Contratante pagará por tais serviços o valor de 2,0 (dois) salários mínimos por contra a apresentação e a aceitação do relatório final, conforme estabelecido no cronograma abaixo.
       §1 O pagamento dos serviços será feito em parcelas mensais até o dia 1 (um) de cada mês conforme o cronograma de desembolsos e orçamento apresentado no cronograma abaixo.
       §2 O primeiro pagamento deverá ser feito no ato da assinatura do contrato.</p><br><br>

       <p><strong>Cláusula IV - Das obrigações da CONTRATADA</strong><br> 
       A CONTRATADA se compromete a utilizar qualquer informação e/ou documentos obtidos da CONTRATANTE, ou proporcionados por ela para fins do presente Contrato, exclusivamente para as atividades aqui estipuladas.<br> 
       § 1 Este Contrato não poderá ser cedido, no todo ou em parte, ressalvada a concordância expressa, escrita, de ambas as partes. </p><br><br>

       <p><strong>Cláusula V - Das obrigações da CONTRATANTE</strong><br> 
       A contratante se compromete a colocar à disposição da CONTRATADA (informações / documentos / meios / recursos / pessoas etc.) necessários à realização dos serviços aqui estipulados.</p><br><br> 

       <p><strong>Cláusula VI - Da Liberação dos pagamentos</strong><br> 
       Todos os pagamentos previstos neste instrumento serão liberados e realizados após aprovação formal pela Contratante , no que diz respeito à qualidade do trabalho apresentada pela Contratada através da entrega das etapas cumpridas no objeto desse contrato.</p><br><br> 

       <p><strong>Cláusula VII - Das alterações</strong><br> 
       Qualquer modificação que afete os termos, condições ou especificações do presente Contrato deverá ser objeto de alteração por escrito com anuência de ambas as partes.</p><br><br> 

       <p> <strong>Cláusula VIII – Rescisão</strong><br>
       Para a rescisão do contrato por qualquer uma das partes fica estabelecido que a outra parte deverá informar com 30 dias de antecedência.</p><br><br>

       <p><strong>Cláusula XIX - Do foro</strong><br> 
       O foro deste contrato é o da Comarca Salvador, Estado de Bahia com preferência sobre qualquer outro. 
       E, por estarem assim justas e contratadas, as partes assinam o presente instrumento em 2 (duas) vias de igual forma e teor, para um só efeito.</p><br><br> 
       <br>
       Salvador, <?=$today?>
       <br><br>
       ____________________ 
       <br>Contratada 
       <br>FÁBIO MARTINS DA SILVA
       <br>PROJEK CONSULTORIA
       <br><br>
       ___________________ 
       <br>Contratante
       <br> <?=$socios[0]['nome']?> 
       <br><?=$cliente['razao']?> 
       <br><br>
       <br>Testemunhas 
       <br>
       <br>a) .................................. 
       <br>
       <br>b) ..................................
                             </span>
    </div>
    <div style="text-align:center;">
        <button id="button">Baixar</button>
    </div>
    
</body> 
<script type="text/javascript">   
    $('#button').click(function() {
      var doc = new jsPDF();


      doc.addHTML($('#conteudo'), function() {
        doc.save("teste.pdf");
      });

    });
</script>   
</html>



   

