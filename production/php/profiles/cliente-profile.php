<?php include ("../bancos/conecta.php");?>
<?php include ("../bancos/banco-market.php");?>
<?php include ("../bancos/banco-lead.php");?>
<?php include ("../bancos/banco-suspect.php");?>
<?php include ("../bancos/banco-prospect.php");?>


<?php
$id = $_GET['id'];
$cliente = buscaCliente($conexao, $id);
$prospeccao = buscaLeads($conexao, $id);
$apresentacoes = buscaClientesApresentacao($conexao, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PROJEK</title>
  <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <link href="../../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <link href="../../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="../../../build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/teste.css">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index2.php" class="site_title"><img src="../../images/botão copiar.png" width="40" right="40" ><span>PROJEK</span></a>
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
                  <li><a><i class="fa fa-desktop"></i>LISTAR<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="usuarios.php">USUÁRIOS</a></li>
                      <li><a href="produtos.php">PRODUTOS</a></li>
                      <li><a href="usuarios-consultores.php">CONSULTORES</a></li>
                      <li><a href="clientes.php">CLIENTES</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> NEGÓCIOS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="clientes-mercado.php">MERCADO</a></li>
                      <li><a href="clientes-prospeccao.php">PROSPECÇÃO</a></li>
                      <li><a href="clientes-apresentacao.php">APRESENTAÇÃO</a></li>
                      <li><a href="clientes-oportunidade.php">OPORTUNIDADE</a></li>
                      <li><a>CONTRATO<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="contrato-mapeamento.php">MAPEAMENTO DE PROCESSOS</a></li>
                          <li><a href="contrato-auditoria.php">AUDITORIA DE PROCESSOS</a></li>
                          <li><a href="contrato-gestao.php">GESTÃO DE CONHECIMENTO</a></li>
                        </ul>
                      </li>
                      <li><a>PÓS-VENDA<span class="fa fa-chevron-down"></span></a> 
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
                    <li><a><i class="fa fa-file-text-o"></i> RELATÓRIOS <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      </ul>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
                      <img src="images/img2.jpg" alt="">Fabio
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
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"></a></li>
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
                    <h3>Página do Cliente</h3>
                  </div>
                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Go!</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>

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
                            <a class="btn btn-success"  href="../forms/form-altera-cliente.php?id=<?=$cliente['id']?>">Editar Perfil</a>
                            <a  class="btn btn-primary" href="../forms/form-lead.php?id=<?=$cliente['id']?>"> Novo Lead</a>
                            <a  class="btn btn-warning" href="../forms/form-suspect.php?id=<?=$cliente['id']?>">Novo Suspect</a>
                            <a  class="btn btn-danger" href="../forms/form-prospect.php?id=<?=$cliente['id']?>">Novo Prospect</a>
                          </div>

                          <br />

                          <!-- start accordion -->
                          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
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
                                          <th>Comentário</th>
                                          <th>Ações</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><?=$prosp['nome']?></td>
                                          <td><?=$prosp['email']?></td>
                                          <td><?=$prosp['tel']?></td>
                                          <td><?=$prosp['cargo']?></td>
                                          <td><?=$prosp['comentario']?></td>
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
                                  <p><strong>Collapsible Item 3 data</strong>
                                  </p>
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
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
        <script src="../../../vendors/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../../../vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../../../vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../../../vendors/moment/min/moment.min.js"></script>
        <script src="../../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="../../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="../../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="../../../../../vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="../../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="../../../vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="../vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="../vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- Cidades e Estados -->
        <script src="js/cidades-estados-utf8.js"></script>
        <script language="JavaScript" type="text/javascript" charset="utf-8">
          new dgCidadesEstados({
            cidade: document.getElementById('cidade1'),
            estado: document.getElementById('estado1')
          })
        </script>
        <script src="js/teste.js"></script>
      </body>
      </html>
