<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-market.php";?>

<?php
$id = $_GET['id'];
$contrato = buscaContrato($conexao , $id);
$cliente= buscaCliente($conexao, $contrato['id_clientes']);
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
   Contrato de prestação de serviços para oferta de treinamento e consultoria de extensão em gestão organizacional, processos gerenciais e planejamento estratégico que entre si celebram PROJEK CONSULTORIA E TREINAMENTO doravante CONTRATADA e <?=$cliente['nome']?>, Nome Fantasia <?=$cliente['fantasia']?>, pessoa jurídica de direito privado, inscrita no Cadastro Nacional de Pessoas Jurídicas sob nº CNPJ Nº <?=$cliente['cnpj']?>, com sede na <?=$cliente['endereco']?>, neste ato representada pelo seu administrador, <?=$contrato['administrador']?>, brasileiro, empresário, casado CPF nº <?=$contrato['cpf']?>,  residente em <?=$contrato['residencia']?> denominada CONTRATANTE.

   Por este instrumento particular, as Partes adiante identificadas e qualificadas, a saber:

   CONTRATADA: PROJEK CONSULTORIA , inscrita no Cadastro Nacional de Pessoas Jurídicas sob o nº 23.913.067/0001-12, com sede RUA ALCEU AMOROSO LIMA Nº786, SALA 312, EDF. TANCREDO NEVES TRADE CENTER,  SALVADOR – BA. Tel: 71 3039-9780, neste ato representada pelo seu administrador, Sr. Fábio Martins da Silva, RG: 4978785-34, residente na Rua Salgueiro, 455, Apto. 2101, Condomínio ATMOS – Greenville, Torre Átria, Patamares, Salvador – Ba.

   CONTRATANTE: ___________________, Nome Fantasia ________, pessoa jurídica de direito privado, inscrita no Cadastro Nacional de Pessoas Jurídicas sob nº CNPJ Nº _____________________, com sede na ____________________________________, neste ato representada pelo seu administrador, ________________________________, brasileiro, empresário, casado CPF nº ___________________,  residente em ___________________________.

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
   <center>1o. ALMOXARIFADO</center>
   <center>2o. ARMAZENAMENTO</center>
   <center>3o. COMERCIAL</center>
   <center>4o. COMPRAS</center>
   <center>5o. CONTROLADORIA</center>
   <center>6o. ENTREGA</center>
   <center>7º FINANCEIRO</center>
   <center>8º PRODUÇÃO</center></br>


   §2 – As partes dão de acordo no cronograma de trabalho abaixo que irá nortear as atividades de consultoria.
   <center><p><br>Plano de Trabalho –   2017 / 2018</p></center>
   <center>Julho/17</center>
   <center>Agosto/17</center>
   <center>Setembro/17</center>
   <center>Outubro/17</center>
   <center>Novembro/17</center>
   <center>Dezembro/17</center>
   <center>Janeiro/18</center>
   <center>Fevereiro/18</center>
   <center>Março/18</center>
   <center>Abril/18</center>
   <center>Maio/18</center>
   <center>Junho/18</center></br>
   Cláusula II - Do prazo 
   Os serviços a que se refere a cláusula antecedente serão realizados e postos à disposição da Contratante a partir de 1 de Julho de 2017 a 1 de Julho de 2018.

   Cláusula III - Da remuneração 
   A Contratante pagará por tais serviços o valor de 2,0 (dois) salários mínimos por contra a apresentação e a aceitação do relatório final, conforme estabelecido no cronograma abaixo.
   §1 O pagamento dos serviços será feito em parcelas mensais até o dia 1 (um) de cada mês conforme o cronograma de desembolsos e orçamento apresentado no cronograma abaixo.
   §2 O primeiro pagamento deverá ser feito no ato da assinatura do contrato.
   <br>
   <br>
   <br>
   <br>
   <center><br><h2>Investimento  –  2017</h2></center>
   <center>Julho/17  R$ 1.874,00</center>
   <center>Agosto/17 R$ 1.874,00</center>
   <center>Setembro/17  R$ 1.874,00</center>
   <center>Outubro/17   R$ 1.874,00</center>
   <center>Novembro/17  R$ 1.874,00</center>
   <center>Dezembro/17  R$ 1.874,00</center>
   <center>Janeiro/18   R$ 1.874,00</center>
   <center>Fevereiro/18 R$ 1.874,00</center>
   <center>Março/18  R$ 1.874,00</center>
   <center>Abril/18  R$ 1.874,00</center>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
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
       var docDefinition = { content: 'This is an sample PDF printed with pdfMake' };
        pdfMake.createPdf(docDefinition).open();
   </script>
</body>
</html>



   

