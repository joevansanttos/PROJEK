<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php include ("../bancos/conecta.php");?>
<?php include ("../bancos/banco-market.php");?>
<?php include ("../bancos/banco-lead.php");?>
<?php include ("../bancos/banco-suspect.php");?>
<?php include ("../bancos/banco-prospect.php");?>
<?php include ("../bancos/banco-historico.php");?>
<?php
$id = $_GET['id'];
$cliente = buscaMarket($conexao, $id);
$prospeccao = buscaLeads($conexao, $id);
$apresentacoes = buscaClientesApresentacao($conexao, $id);
$prospects = buscaProspects($conexao, $id);
$historicos =  buscaHistoricos($conexao, $id);
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
    <script type="text/javascript"></script>
    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
    <script src="../../../vendors/jquery-tabledit/jquery.tabledit.min.js"></script>
    <style type="text/css">
      .hide{

      visibility: hidden

      }
    </style>

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
     
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
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
                <h3>Cliente</h3>
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
                  <div class="clearfix"></div>                
                  <div class="x_content">
                    <div class="row" >
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" >
                          <div class="x_title">
                            <h2>Dados do Cliente</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content" align="center">
                            <div class="col-md-12 col-sm-3 col-xs-12 profile_left " >
                              <div class="profile_img">
                                <div id="crop-avatar">
                                  <!-- Current avatar -->
                                  <img class="img-responsive avatar-view" src="../../images/user.png" alt="Avatar" title="Change the avatar">
                                </div>
                              </div>
                              <h3><?=$cliente['nome']?></h3>

                              <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i><?=$cliente['endereco']?>
                                </li>

                                <li>
                                  <i class="fa fa-briefcase user-profile-icon"></i><?=$cliente['tel']?>
                                </li>

                                <li class="m-top-xs">
                                  <i class="fa fa-external-link user-profile-icon"></i>
                                  <a href="https://www.nestle.com.br/site/home.aspx" target="_blank"><?=$cliente['site']?></a>
                                </li>
                              </ul>
                            </div>

                            <!-- Teste -->
                            <div class="x_content" style="display: block;">

                              <div class="container">
                                <a class="btn btn-success"  href="../forms/form-altera-market.php?id=<?=$cliente['id_market']?>">Editar Perfil</a>
                                <a  class="btn btn-primary" href="../forms/form-lead.php?id=<?=$cliente['id']?>"> Novo Lead</a>
                                <a  class="btn btn-warning" href="../forms/form-suspect.php?id=<?=$cliente['id']?>">Novo Suspect</a>
                                <a  class="btn btn-danger" href="../forms/form-prospect.php?id=<?=$cliente['id']?>">Novo Prospect</a>
                              </div>

                              <br />

                              <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
                                    <h4 class="panel-title">Histórico</h4>
                                  </a>
                                  <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                    <?php
                                      foreach ($historicos as $historico) {
                                        # code...
                                    ?>
                                        <table class="table table-bordered">
                                          <thead>
                                            <th>Data</th>
                                            <th>Comentário</th>
                                          </thead>
                                          <tbody>
                                            <td><?=$historico['data']?></td>
                                            <td><?=$historico['comentario']?></td>
                                          </tbody>
                                        </table>
                                    <?php
                                       }
                                    ?>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h4 class="panel-title">Leads</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                    <?php
                                    foreach ($prospeccao as $prosp){
                                    ?>
                                        <table class="table table-bordered">

                                          <thead>
                                            <tr>
                                              <th>Nome</th>
                                              <th>Email</th>
                                              <th>Telefone</th>
                                              <th>Cargo</th>
                                              <th>Ações</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><?=$prosp['nome']?></td>
                                              <td><?=$prosp['email']?></td>
                                              <td><?=$prosp['tel']?></td>
                                              <td><?=$prosp['cargo']?></td>
                                              <td>
                                                <a href="remove-cliente-prospeccao.php?id=<?=$cliente['id']?>"><button class="btn btn-danger btn-xs">Remover</button></a>
                                                <a href="form-altera-cliente-prospeccao.php?id=<?=$cliente['id']?>"><button class="btn btn-success btn-xs">Editar</button></a>
                                              </td>
                                            </tr>
                                          </tbody>
                                        <?php
                                          }
                                        ?>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Suspects</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                    <?php
                                      foreach ($apresentacoes as $apresentacao){
                                    ?>
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th>Contato</th>
                                              <th>Data</th>
                                              <th>Status</th>
                                              <th>Hora</th>
                                              <th>Consultor</th>
                                              <th>Ações</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><?=$apresentacao['contato']?></td>
                                              <td><?=$apresentacao['data']?></td>
                                              <td><?=$apresentacao['status']?></td>
                                              <td><?=$apresentacao['hora']?></td>
                                              <td><?=$apresentacao['consultor']?></td>
                                              <td>
                                                <a href="remove-cliente-apresentacao.php?id=<?=$apresentacao['id']?>"><button class="btn btn-danger btn-xs">Remover</button></a>
                                                <a href="form-altera-cliente-apresentacao.php?id=<?=$cliente['id']?>"><button class="btn btn-success btn-xs">Editar</button></a>
                                              </td>
                                            </tr>
                                          </tbody>
                                        <?php
                                          }
                                        ?>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Prospects</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                                    <div class="panel-body">
                                      <?php
                                        foreach ($prospects as $prospect){
                                      ?>
                                          <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th>Valor</th>
                                                <th>Recebimento</th>
                                                <th>Fechamento</th>
                                                <th>Ações</th>                                        
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td><?=$prospect['valor_est']?></td>
                                                <td><?=$prospect['recebimento']?></td>
                                                <td><?=$prospect['fechamento']?></td>                                          
                                                <td>
                                                  <a href="remove-cliente-apresentacao.php?id=<?=$apresentacao['id']?>"><button class="btn btn-danger btn-xs">Remover</button></a>
                                                  <a href="form-altera-cliente-apresentacao.php?id=<?=$cliente['id']?>"><button class="btn btn-success btn-xs">Editar</button></a>
                                                </td>
                                              </tr>
                                            </tbody>
                                          <?php
                                            }
                                          ?>
                                        </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end of accordion -->


                            </div>




                          </div>



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
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
    <script src="../../js/datatable.js"></script>
    <script src="../../../vendors/jquery-tabledit/jquery.tabledit.min.js"></script>
    <script type="text/javascript">       
   
    </script>
    <script type="text/javascript">
      
    </script>
    <script>
      $(".datatable").each( function() {
        var id = this.id;        
      
        $('#'+ id).Tabledit({
         url:'action.php',
         columns:{
          identifier:[0, "id_tarefas_contrato"],
          editable:[[2, 'data_inicio'], [3, 'data_fim']]

         },
         inputClass: 'form-control input-sm',
         deleteButton: false,
         restoreButton:false,
         onSuccess:function(data, textStatus, jqXHR){    
         }
        });
       });
    </script>
  </body>
</html>

