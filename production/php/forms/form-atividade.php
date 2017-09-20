<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-usuario.php";?>
<?php include "../bancos/banco-projeto.php";?>
<?php include "../bancos/banco-contrato.php";?>
<?php include "../bancos/banco-departamentos-contrato.php";?>
<?php include "../bancos/banco-departamentos.php";?>
<?php include "../bancos/banco-market.php";?>
<?php
$id_projeto = $_GET['id_projeto'];
$projeto = buscaProjeto($conexao, $id_projeto);
$contrato = buscaContrato($conexao, $projeto['n_contrato']);
$cliente = buscaMarket($conexao, $contrato['id_clientes']);
$departamentos = buscaDepartamentosContrato($conexao, $contrato['n_contrato']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projek | Nova Atividade</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
  <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../../../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="../../index2.php" class="site_title"><img src="../../images/botão copiar.png" width="40" right="40" ><span>PROJEK</span></a>
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
                  <li><a><i class="fa fa-desktop"></i> LISTAR<span class="fa fa-chevron-down"></span></a>
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
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"></a></li>
            </ul>
          </nav>
        </div>
      </div>
      </div>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Atividade</h3>
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
            <div class="clearfix"></div>
            <div class="x_content">
              <br />
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <form action="../adiciona/adiciona-atividade.php" method="get" class="form-horizontal form-label-left" novalidate> 
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome do Cliente <span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" readonly="readonly" value="<?=$cliente['nome']?>"  class="form-control" >
                     </div>
                    </div>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nº Contrato <span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" readonly="readonly" value="<?=$contrato['n_contrato']?>" id="n_contrato" name="n_contrato" required="required" class="form-control" >
                     </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="departamento">Departamento<span class="required">*</span>
                      </label>
                      <div class="col-sm-8 col-xs-12 col-md-6">
                        <select id="departamento" name="departamento" required class="form-control col-md-8 col-xs-12">
                        <?php
                        foreach ($departamentos as $departamento) {
                          $nomeDepartamento = buscaNomeDepartamento($conexao, $departamento['id_departamento']);
                        ?>
                          <option value="<?=$departamento['id_departamento_contrato']?>"><?=$nomeDepartamento['descricao']?></option>
                        <?php                         
                        }
                        ?>

                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_consultor">Consultor<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="id_consultor" class="form-control col-md-7 col-xs-12">
                         <?php
                         $usuarios = listaUsuarios($conexao);
                         foreach ($usuarios as $usuario){ 
                           if($usuario["id_profissao"] == '1'){
                             ?>

                             <option value="<?=$usuario['id_usuario']?>" ><?=$usuario['nome']?></option>
                             <?php
                           }
                         }
                         ?>  
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">Horas<span class="required">*</span></label>
                      <div class="col-md-5 col-sm-6 col-xs-12">
                        <input type="text" id="horas" name="horas" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Descrição da Atividade<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="descricao" name="descricao" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_inicio">Inicio<span class="required">*</span></label>
                      <div class="col-sm-2 col-xs-12 col-md-2">
                        <input type="date" id="data_inicio" name="data_inicio" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="data_fim">Fim<span class="required">*</span></label>
                      <div class="col-sm-2 col-xs-12 col-md-2">
                        <input type="date" id="data_fim" name="data_fim" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
                       </div>
                    </div>
                    <div class="item form-group ">
                      <div class="form-group">
                        <label for="socio" class="control-label col-md-3 col-sm-3 col-xs-12">Responsável pela Atividade <span class="required">*</span></label>                      
                        <div class=" col-sm-6 col-xs-12 col-md-6">
                          <div class="form-group">
                            <input type="text" placeholder="Nome" name="nome" class="form-control">
                          </div>                       
                          <div class="form-group">
                            <input type="text" placeholder="Cargo" id="cargo" name="cargo" class="form-control col-md-7 col-xs-12">
                          </div>
                          <div class="form-group">
                            <input type="email" placeholder="Email" id="email" name="email" class="form-control col-md-7 col-xs-12">
                          </div>
                          <div class="form-group">
                            <input data-inputmask="'mask' : '(99) 99999-9999'" type="text" placeholder="Telefone" id="tel" name="tel" class="form-control col-md-7 col-xs-12">
                          </div>                      
                        </div>
                      </div>
                    </div>   
                    <div class="col-md-6 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Cancelar</button>
                      <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
                      <input type="hidden" name="id_projeto" id="id_projeto" value="<?=$projeto['id_projeto']?>" />
                    </div>
                  </form> 
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
<!-- Parsley -->
<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../../build/js/custom.min.js"></script>
</body>
</html>
