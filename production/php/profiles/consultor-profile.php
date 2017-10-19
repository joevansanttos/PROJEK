<?php 
  header('Content-Type: text/html; charset=utf-8'); 
  error_reporting(E_ALL ^ E_NOTICE);
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-usuario.php";
  require_once "../bancos/banco-feedback.php";
  require_once "../bancos/banco-market.php";
  require_once "../bancos/banco-lead.php";
  require_once "../bancos/banco-consultores-market.php";
  require_once "../logica/logica-usuario.php";
  verificaUsuario();
  $email = $_SESSION["usuario_logado"];
  $u = buscaUsuarioEmail($conexao, $email);
  $id_u = $u['id_usuario'];
  $id = $_GET['id'];
  $usuario = buscaUsuario($conexao, $id);
  $n_markets = buscaMarketConsultores($conexao , $usuario['id_usuario']);
  $n_market = count($n_markets);
  $n_leads = buscaLeadsConsultores($conexao , $usuario['id_usuario']);
  $n_lead = count($n_leads);
  $n_suspects = buscaSuspectConsultores($conexao , $usuario['id_usuario']);
  $n_suspect = count($n_suspects);
  $n_prospects = buscaProspectConsultores($conexao , $usuario['id_usuario']);
  $n_prospect = count($n_prospects);
  $feedbacks = listaConsultorFeedback($conexao, $id);
  $size = count($feedbacks);
  $pontual = 0;
  $assiduo = 0;
  $conhecimento = 0;
  $empatia = 0;
  if($size > 0){    
    foreach ($feedbacks as $feedback) {
      $pontual = $pontual + $feedback['pontual'];
      $assiduo = $assiduo + $feedback['assiduo'];
      $conhecimento = $conhecimento + $feedback['conhecimento'];
      $empatia = $empatia + $feedback['empatia'];
    }
    $pontual = $pontual/$size;
    $assiduo = $assiduo/$size;
    $conhecimento = $conhecimento/$size;
    $empatia = $empatia/$size;
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJEK | Perfil do Consultor</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
    <!-- Bootstrap -->
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">    
    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
    <script src="../../../vendors/Chart.js/dist/Chart.js"></script>
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
                <?php                  
                  $sql = "SELECT * FROM profileimg WHERE id_usuario = $id_u";
                  $sth = $conexao->query($sql);
                  $result=mysqli_fetch_array($sth);
                  if($result != null){
                    echo '<img class="img-responsive img-circle profile_img" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
                  }else{
                ?>
                <img class="img-responsive img-circle profile_img" src="../../images/user.png">
                <?php    
                  }                            
                  
                ?>
                <img src="" alt="..." >
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2><?=$u['nome']?></h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Menu<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../index/index2.php">Dashboard</a></li>
                    </ul>
                    
                  </li>
                  <li><a><i class="fa fa-list"></i> Listar<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../usuarios/usuarios.php">Usuários</a></li>
                      <li><a href="../produtos/produtos.php">Produtos</a></li>
                      <li><a href="../usuarios/consultores.php">Consultores</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-briefcase"></i> Negócios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../empresas/market.php">Market</a></li>
                      <li><a href="../empresas/leads.php">Leads</a></li>
                      <li><a href="../empresas/suspects.php">Suspects</a></li>
                      <li><a href="../empresas/prospects.php">Prospects</a></li>
                      <li><a href="../contratos/contratos.php">Contratos</a></li>                     
                      <li><a href="../pos-venda/pos-venda.php">Pós-venda</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Consultoria <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../consultoria/projetos.php">Projetos</a></li>                     
                    </ul>
                  </li>
                </ul>
              </div>
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
                    <?=$u['nome']?>
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
                    <li><a href="../../logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
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
              <div class="title_left"><h3>Perfil do Consultor</h3> </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span>
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
                    <h2><?=$usuario['nome']?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="../../images/user.png" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?=$usuario['nome']?></h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i><?=$usuario['cidade']?></li>
                        <li><i class="fa fa-briefcase user-profile-icon"></i> <?=$usuario['telefone']?></li>
                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank"><?=$usuario['email']?></a>
                        </li>
                      </ul>
                      <br />
                      <!-- start skills -->
                      <h4>Feedback</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Pontualidade</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$pontual?>"></div>
                          </div>
                        </li>
                        <li>
                          <p>Assiduidade</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$assiduo?>"></div>
                          </div>
                        </li>
                        <li>
                          <p>Conhecimento</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$conhecimento?>"></div>
                          </div>
                        </li>
                        <li>
                          <p>Empatia</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$empatia?>"></div>
                          </div>
                        </li>
                      </ul>
                      <!-- end of skills -->
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6"><h2>Atividades do Consultor</h2></div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->                      

                      <canvas id="myChart" style="width:100%; height:280px;"></canvas>
                      <!-- end of user-activity-graph -->

                      <!-- Start Tab Panel -->
                      
                      <!-- End Tab Panel -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <!-- /page content --> 
        <div class="clearfix"></div>
        

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
    <!-- morris.js -->
    <script src="../../../vendors/raphael/raphael.min.js"></script>
    <script src="../../../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../../vendors/moment/min/moment.min.js"></script>
    <script src="../../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../../../vendors/Chart.js/dist/Chart.js"></script>
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
    <script src="../../js/datatable.js"></script> 
    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
    <script>

      $(document).ready(function(){
         var ctx = document.getElementById("myChart");
         var myChart = new Chart(ctx, {
             type: 'bar',
             data: {
                 labels: ["Market",  "Leads", "Suspects", "Prospects"],
                 datasets: [{
                     label: '# of Votes',
                     data: [<?=$n_market?>, <?=$n_lead?>, <?=$n_suspect?>, <?=$n_prospect?>],
                     backgroundColor: [
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(54, 162, 235, 0.2)',
                         'rgba(255, 206, 86, 0.2)',
                         'rgba(75, 192, 192, 0.2)',
                         'rgba(153, 102, 255, 0.2)',
                         'rgba(255, 159, 64, 0.2)'
                     ],
                     borderColor: [
                         'rgba(255,99,132,1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(255, 159, 64, 1)'
                     ],
                     borderWidth: 1
                 }]
             },
             options: {
                 scales: {
                     yAxes: [{
                         ticks: {
                             beginAtZero:true
                         }
                     }]
                 }
             }
         });
      });
    
   
    </script>
  </body>
</html>
