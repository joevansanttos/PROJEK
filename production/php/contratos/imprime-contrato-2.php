<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-socio.php";?>
<?php include "../bancos/banco-departamentos-contrato.php";?>
<?php include "../bancos/banco-departamentos.php";?>

<?php
$n_contrato = $_GET['n_contrato'];
$today = date("d.m.Y");
$todayPieces = explode(".", $today);
$contrato = buscaContrato($conexao , $n_contrato);
$departamentos =[];
$departamentosContrato = buscaDepartamentosContrato($conexao, $contrato['n_contrato']);
foreach ($departamentosContrato as  $dep) {
  $departamento = buscaDepartamento($conexao, $dep['id_departamento']);
  array_push($departamentos, $departamento[0]['descricao'] );
}
$cliente= buscaMarket($conexao, $contrato['id_clientes']);
$socios = buscaSociosContrato($conexao, $contrato['n_contrato']);


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
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJEK | Contratos</title>

  <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>

    <!-- Bootstrap -->
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Datatables -->

    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

    <script src='.../../../vendors/jsPDF-1.3.2/dist/jspdf.min.js'></script>
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript"></script>
    <style type="text/css">
      #conteudo  p {
         text-align: justify;
         font-size: 11pt;
         font-family: Calibri;
         display: inline;
         
      }

      #conteudo {
          text-align: justify;
          text-justify: inter-word;
      }

      #conteudo  h1{
          font-size: 16pt;
         font-family: Calibri;
      }

      #conteudo  h2{
          font-size: 18pt;
         font-family: Calibri;
      }
      
      #conteudo {
        background-color: white;
        padding: 50px;
        margin: 10px;
      }

      .center{
        font-size: 100pt;
        text-align: center;
      }
      body {visibility:hidden;}
      #conteudo {visibility:visible;}
    </style>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Sidebar-->      
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../../index2.php" class="site_title"><img src="../../images/botão copiar.png" width="40" right="40" ><span>PROJEK</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../images/img2.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2>Fabio</h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-desktop"></i> LISTAR <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../usuarios/usuarios.php">USUÁRIOS</a></li>
                      <li><a href="../produtos/produtos.php">PRODUTOS</a></li>
                      <li><a href="../usuarios/consultores.php">CONSULTORES</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> NEGÓCIOS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../empresas/market.php">MARKET</a></li>
                      <li><a href="../empresas/leads.php">LEADS</a></li>
                      <li><a href="../empresas/suspects.php">SUSPECTS</a></li>
                      <li><a href="../empresas/prospects.php">PROSPECTS</a></li>
                      <li><a href="contratos.php">CONTRATOS</a></li>                     
                      <li><a href="../pos-venda/pos-venda.php">PÓS-VENDA</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> CONSULTORIA <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="contrato-mapeamento.php">MAPEAMENTO DE PROCESSOS</a></li>
                      <li><a href="contrato-auditoria.php">AUDITORIA DE PROCESSOS</a></li>
                      <li><a href="contrato-gestao.php">GESTÃO DE CONHECIMENTO</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> FINANCEIRO <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">CONTAS A PAGAR</a></li>
                      <li><a href="chartjs2.html">CONTAS A RECEBER</a></li>
                      <li><a href="morisjs.html">CONCILIAÇÃO</a></li>
                      <li><a href="echarts.html">FLUXO DE CAIXA</a></li>
                      <li><a href="other_charts.html">COBRANÇA</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cart-plus"></i> COMPRAS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index2.html">SOLICITAÇÃO DE COMPRAS</a></li>
                      <li><a href="form_advanced.html">ORÇAMENTO</a></li>
                      <li><a href="form_validation.html">ORDEM DE COMPRA</a></li>
                      <li><a href="form_wizards.html">ACOMPANHAMENTO DE ENTREGA</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-group"></i>RECURSOS HUMANOS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">SOLICITAÇÃO COLABORADOR</a></li>
                      <li><a href="fixed_footer.html">SELEÇÃO</a></li>
                      <li><a href="fixed_footer.html">RECRUTAMENTO</a></li>
                      <li><a href="fixed_footer.html">ADMISSÃO</a></li>
                      <li><a href="fixed_footer.html">AVALIAÇÃO DE DESEMPENHO</a></li>
                      <li><a href="fixed_footer.html">FÉRIAS</a></li>
                      <li><a href="fixed_footer.html">DESENVOLVIMENTO HUMANO</a></li>
                      <li><a href="fixed_footer.html">DEMISSÃO</a></li>
                    </ul>
                  </li>               
                </ul>
              </div>
              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div> 
              <!-- end footer menu-->
            </div>          
          </div>
        </div>      
        <!-- Col-->
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../images/img2.jpg" alt="">Fabio
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Configurações</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation --> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Contratos</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquise...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> 
            <!--Page Title-->             
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                  
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                  </div>
                  <div class="clearfix"></div>                
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <button id="button" onclick="printDiv('conteudo')" class="btn btn-default">Baixar</button>
                        <div id="conteudo">    
                          <span class="section"><h1><center><strong>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</strong></center></h1>                
                          <br>
                                <center><h2><strong><?=$contrato['data_inicio']?></strong></h2> </center>
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


                          <center><p><strong>RESOLVEM</strong></p></center><br>
                          
                          <p><strong>Cláusula I – Do objeto</strong><br> 
                            A <strong>Contratada</strong> se compromete a aplicar a Plataforma de Treinamento EAD, baseado em um sistema de gestão de aprendizagem, desenvolvido a partir de uma metodologia pedagógica para promover o ensino online de forma eficiente e bem estruturada.<br>
                            §1 – O produto da Plataforma EAD está descrito abaixo:<br>
                           <strong>Cursos online personalizados</strong> – Nos cursos online estão disponíveis um ambiente de sala de aula virtual personalizado, para o colaborador aprender e aperfeiçoar conhecimentos de forma simples e lúdica através de slides sincronizados com explicações de profissionais qualificados.<br>
                           <strong>Exercícios de fixação:</strong> Para uma aprendizagem mais eficiente o aluno poderá realizar, ao longo das aulas exercícios para uma melhor memorização do conteúdo. <br>

                           <strong>Avalições com diferentes tipos de questões –</strong> Após a conclusão de cada curso o colaborador poderá testar seus conhecimentos a fim de avaliar se o aprendizado foi realmente eficiente.<br>
                           <strong>Certificação automatizada – </strong> Após a conclusão dos cursos e aprovação com média suficiente na avaliação, o colaborador sairá certificado, comprovando assim o conhecimento obtido.</p><br>

                            <br>
                            <center><p><strong>AULAS POR DEPARTAMENTO</strong></p></center><br>
                            <table class="table table-bordered">
                                 <?php
                                  foreach ($departamentos as  $d) {
                                ?>
                                <tr>
                                   <th><p><?=$d?></p></th>
                                   <td><p>40 h</p></td> 
                                </tr>
                                     
                                        
                                    <?php
                                      }
                                     ?>
                                
                            </table>
                            
                            </br>
                            </br>
                            </br>

                            <p>§2 – As partes dão de acordo no cronograma de trabalho abaixo que irá nortear as atividades de consultoria.</p><br>  
                            
                            <center><br><strong><p>PLANO DE TRABALHO –   2017 / 2018</p></strong></center>
                            <br>
                            <table class="table table-bordered">
                                <?php
                                   foreach ($plano as  $value) {
                                 ?>
                                    <tr>
                                        <th><p><?=$value?></p></th>
                                        <td><p>40 h</p></td>
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
                           <p>Salvador, <?=$today?></p>
                           <br><br>
                           ____________________ 
                           <br><p>Contratada</p> 
                           <br><p>FÁBIO MARTINS DA SILVA</p>
                           <br><p>PROJEK CONSULTORIA</p>
                           <br><br>
                           ___________________ 
                           <br><p>Contratante</p>
                           <br><p><?=$socios[0]['nome']?> </p> 
                           <br><p><?=$cliente['razao']?></p> 
                           <br><br>
                           <br><p>Testemunhas</p> 
                           <br>
                           <br><p>a)</p> .................................. 
                           <br>
                           <br><p>b)</p> ..................................
                                                 </span>
                        </div>
                       </div>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>    
        <div class="clearfix"></div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            PROJEK
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
    </div>
    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
    <script src="../../js/datatable.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          // Setup - add a text input to each footer cell
          $('#tabela tfoot th').each( function () {
              var title = $(this).text();
              if(title != ''){
                $(this).html( '<input class="" type="text" placeholder="'+title+'" />' );
              }
              
          } );
       
          // DataTable
          var table = $('#tabela').DataTable();
       
          // Apply the search
          table.columns().every( function () {
              var that = this;
       
              $( 'input', this.footer() ).on( 'keyup change', function () {
                  if ( that.search() !== this.value ) {
                      that
                          .search( this.value )
                          .draw();
                  }
              } );
          } );
      } );
    </script> 
    <script type="text/javascript">   
        $('#button').click(function() {
          var doc = new jsPDF();


          doc.addHTML($('#conteudo'), function() {
            doc.save("teste.pdf");
          });
    </script>

    <script type="text/javascript">
      
    </script>
  </body>
</html>

