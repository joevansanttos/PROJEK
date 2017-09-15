<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-socio.php";?>
<?php include "../bancos/banco-departamentos-contrato.php";?>
<?php include "../bancos/banco-departamentos.php";?>

<?php
$id = $_GET['id'];
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
    <script src='../../js/pdfmake.min.js'></script>
    <script src='../../js/vfs_fonts.js'></script>
</head>
<body>
    <span class="section"><center>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</center>                
   <br>
   <center>
   <?=$contrato['data_inicio']?>
   </center>
   <br> 
   Por este instrumento particular, as Partes adiante identificadas e qualificadas, a saber:<br><br>

   CONTRATADA: PROJEK CONSULTORIA , inscrita no Cadastro Nacional de Pessoas Jurídicas sob o nº 23.913.067/0001-12, com sede RUA ALCEU AMOROSO LIMA Nº786, SALA 312, EDF. TANCREDO NEVES TRADE CENTER,  SALVADOR – BA. Tel: 71 3039-9780, neste ato representada pelo seu administrador, Sr. Fábio Martins da Silva, RG: 4978785-34, residente na Rua Salgueiro, 455, Apto. 2101, Condomínio ATMOS – Greenville, Torre Átria, Patamares, Salvador – Ba.

   CONTRATANTE: <?=$cliente['razao']?> , Nome Fantasia <?=$cliente['nome']?>, pessoa jurídica de direito privado, inscrita no Cadastro Nacional de Pessoas Jurídicas sob nº CNPJ Nº <?=$cliente['cnpj']?>, com sede na <?=$contrato['sede']?>,neste ato representada pelo seu administrador,
   <?php
    foreach ($socios as $key => $socio) {
   ?>
    
     <?=$socio['nome']?>, brasileiro, empresário, casado CPF nº <?=$socio['cpf']?>,  residente em <?=$socio['residencia']?>.

   <?php   # code...
    }
   ?>
     

   Considerando que a Contratada está disposta a prestar os serviços a seguir enumerados e definidos à Contratante, e que esta está disposta a remunerar tais serviços de acordo com as condições também a seguir estipuladas, 

                             


                                                             RESOLVEM 
   Cláusula I – Do objeto 
   A Contratada se compromete a aplicar a Plataforma de Treinamento EAD, baseado em um sistema de gestão de aprendizagem, desenvolvido a partir de uma metodologia pedagógica para promover o ensino online de forma eficiente e bem estruturada.
   §1 – O produto da Plataforma EAD está descrito abaixo:
   Cursos online personalizados – Nos cursos online estão disponíveis um ambiente de sala de aula virtual personalizado, para o colaborador aprender e aperfeiçoar conhecimentos de forma simples e lúdica através de slides sincronizados com explicações de profissionais qualificados.
   Exercícios de fixação: Para uma aprendizagem mais eficiente o aluno poderá realizar, ao longo das aulas exercícios para uma melhor memorização do conteúdo. 
   Avalições com diferentes tipos de questões – Após a conclusão de cada curso o colaborador poderá testar seus conhecimentos a fim de avaliar se o aprendizado foi realmente eficiente.
   Certificação automatizada – Após a conclusão dos cursos e aprovação com média suficiente na avaliação, o colaborador sairá certificado, comprovando assim o conhecimento obtido.
   <br><p><center>AULAS POR DEPARTAMENTO</center></p> 
   <?php
    foreach ($departamentos as  $d) {
  ?>
       <center><?=$d?></center>
  <?php
    }
   ?>
  
  </br>
   </br>
    </br>


   §2 – As partes dão de acordo no cronograma de trabalho abaixo que irá nortear as atividades de consultoria.
   <center><p><br>Plano de Trabalho –   2017 / 2018</p></center>
   <?php
      foreach ($plano as  $value) {
    ?>
      <center> <?=$value?> </center>
    <?php
      }
   ?>

  </br>
   Cláusula II - Do prazo 
   Os serviços a que se refere a cláusula antecedente serão realizados e postos à disposição da Contratante a partir de 1 de Julho de 2017 a 1 de Julho de 2018.

   Cláusula III - Da remuneração 
   A Contratante pagará por tais serviços o valor de 2,0 (dois) salários mínimos por contra a apresentação e a aceitação do relatório final, conforme estabelecido no cronograma abaixo.
   §1 O pagamento dos serviços será feito em parcelas mensais até o dia 1 (um) de cada mês conforme o cronograma de desembolsos e orçamento apresentado no cronograma abaixo.
   §2 O primeiro pagamento deverá ser feito no ato da assinatura do contrato.
   <br>
   <br>
   
   <br>
   Cláusula IV - Das obrigações do Contratado 
   O Contratado se compromete a utilizar qualquer informação e/ou documentos obtidos da Contratante, ou proporcionados por ela para fins do presente Contrato, exclusivamente para as atividades aqui estipuladas. 
   § 1 Este Contrato não poderá ser cedido, no todo ou em parte, ressalvada a concordância expressa, escrita, de ambas as partes. 

   Cláusula V - Das obrigações da Contratante 
   A contratante se compromete a colocar à disposição da Contratada (informações / documentos / meios / recursos / pessoas etc.) necessários à realização dos serviços aqui estipulados. 

   Cláusula VI - Da Liberação dos pagamentos 
   Todos os pagamentos previstos neste instrumento serão liberados e realizados após aprovação formal pela Contratante , no que diz respeito à qualidade do trabalho apresentada pela Contratada através da entrega das etapas cumpridas no objeto desse contrato.

   Cláusula VII - Das alterações 
   Qualquer modificação que afete os termos, condições ou especificações do presente Contrato deverá ser objeto de alteração por escrito com anuência de ambas as partes. 

   Cláusula VIII – Rescisão
   Para a rescisão do contrato por qualquer uma das partes fica estabelecido que a outra parte deverá informar com 30 dias de antecedência.

   Cláusula XIX - Do foro 
   O foro deste contrato é o da Comarca Salvador, Estado de Bahia com preferência sobre qualquer outro. 
   E, por estarem assim justas e contratadas, as partes assinam o presente instrumento em 2 (duas) vias de igual forma e teor, para um só efeito. 
   <br>
   Salvador, ____________________.
   <br>
   ____________________ 
   <br>Contratada 
   <br>FÁBIO MARTINS DA SILVA
   <br>PROJEK CONSULTORIA
   <br>
   ___________________ 
   <br>Contratante
   <br>______________________________ 
   <br>_________________ 
   <br>
   <br>Testemunhas 
   <br>
   <br>a) .................................. 
   <br>
   <br>b) ..................................
                         </span>
   <script type="text/javascript">
    var docDefinition = {
       content: [        
          { text: 'CONTRATO DE PRESTAÇÃO DE SERVIÇOS', style: 'header',margin: [0, 0, 0, 8] },          
         { text: 'CONTRATADA: PROJEK CONSULTORIA , inscrita no Cadastro Nacional de Pessoas Jurídicas sob o nº 20.959.483/0001-63, com sede RUA ALCEU AMOROSO LIMA Nº786, SALA 312, EDF. TANCREDO NEVES TRADE CENTER,  SALVADOR – BA. Tel: 71 3039-9780, neste ato representada pelo seu administrador, Sr. Fábio Martins da Silva, RG: 4978785-34, residente na Rua Salgueiro, 455, Apto. 2101, Condomínio ATMOS – Greenville, Torre Átria, Patamares, Salvador – Ba.',fontSize: 11,alignment: 'justify',margin: [0, 0, 0, 8]},
         { text: 'CONTRATANTE: <?=$cliente['razao']?> , Nome Fantasia <?=$cliente['nome']?>, pessoa jurídica de direito privado, inscrita no Cadastro Nacional de Pessoas Jurídicas sob nº CNPJ Nº <?=$cliente['cnpj']?>, com sede na <?=$contrato['sede']?>,neste ato representada pelo seu administrador,'},
          <?php
            foreach ($socios as $key => $socio) {
          ?>
         { text: ' <?=$socio['nome']?>, brasileiro, empresário, casado CPF nº <?=$socio['cpf']?>,  residente em <?=$socio['residencia']?>.',fontSize: 11,alignment: 'left'},  
          <?php   # code...
             }
          ?>
       ],

       styles: {
         header: {
           fontSize: 14,
           bold: true,
           alignment: 'center'
         },
         anotherStyle: {
           fontSize: 11
         }
       }

     };

    pdfMake.createPdf(docDefinition).open();
   </script>
</body>
</html>



   

