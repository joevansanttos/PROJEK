<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-usuario.php";?>
<?php include "../bancos/banco-feedback.php";?>
<?php include "../bancos/banco-pos_venda.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-contato.php";?>
<?php include "../logica/logica-usuario.php";?>
<?php include "../alerta/mostra-alerta.php";?>
<?php include "../bancos/banco-projeto.php";?>
<?php include "../bancos/banco-departamentos-contrato.php";?>
<?php include "../bancos/banco-departamentos.php";?>
<?php include "../bancos/banco-tarefas-contrato.php";?>
<?php include "../bancos/banco-tarefas.php";?>

<?php
  verificaUsuario();
  $email = $_SESSION["usuario_logado"];
  $usuario = buscaUsuarioEmail($conexao, $email);
  $id_usuario = $usuario['id_usuario'];
?>
<?php
$id_projeto = $_GET['id_projeto'];
$projeto = buscaProjeto($conexao, $id_projeto);
$contrato = buscaContrato($conexao, $projeto['n_contrato']);
$market = buscaMarket($conexao, $contrato['id_clientes']);
$departamentos_contrato = buscaDepartamentosContrato($conexao, $contrato['n_contrato']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJEK | Projetos</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
    <link href="../../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

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
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Sidebar-->      
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../index/index2.php" class="site_title"><img src="../../images/botao.png" width="40" right="40" ><span>PROJEK</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php                  
                    $sql = "SELECT * FROM profileimg WHERE id_usuario = $id_usuario";
                    $sth = $conexao->query($sql);
                    $result=mysqli_fetch_array($sth);                            
                    echo '<img class="img-responsive img-circle profile_img" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
                  ?>
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2><?=$usuario['nome']?></h2>
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
                      <li><a href="../contratos/contratos.php">CONTRATOS</a></li>                     
                      <li><a href="pos-venda.php">PÓS-VENDA</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> CONSULTORIA <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="projetos.php">PROJETOS</a></li> 
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
                    <?=$usuario['nome']?>
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
                <h3>Projeto <?=$market['nome']?></h3>
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
                      <?php
                      foreach ($departamentos_contrato as  $d_contrato) { 
                        $nome_departamento = buscaNomeDepartamento($conexao, $d_contrato['id_departamento']);
                      ?> 
                       <table class="table table-bordered tbl-accordion-nested">
                         <thead>
                           <tr>
                             <td colspan="5" class="tbl-accordion-section"><?=$nome_departamento['descricao']?></td>
                           </tr>
                         <thead>
                         <tbody>
                            <tr>
                              <td>Tarefa</td>
                              <td>Data</td>
                              <td>Horas</td>
                              <td>Entrega</td>
                              <td>Ações</td>
                            </tr>
                            <tr>
                            <?php
                             $tarefas_contrato = listaTarefasContrato($conexao, $d_contrato['id_departamento_contrato'] );
                             foreach ($tarefas_contrato as $t_contrato) {
                              $tarefa = buscaTarefaNome($conexao, $t_contrato['id_tarefa']);
                            ?>  
                              <td><?=$tarefa['nome']?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>                         
                            </tr> 
                            <?php
                              }
                            ?>      
                         </tbody>  
                       </table>
                      <?php
                        }
                      ?>
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
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
    <script src="../../js/datatable.js"></script>
    <script type="text/javascript">       
     $('.tbl-accordion-nested').each(function(){
       var thead = $(this).find('thead');
       var tbody = $(this).find('tbody');
       
       tbody.hide();
       thead.click(function(){
         tbody. slideToggle();
       })
     })
    </script>  
  </body>
</html>
