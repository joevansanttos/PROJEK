<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-usuario.php";?>
<?php include "../bancos/banco-produto.php";?>


<?php
$id = $_GET['id'];
$cliente = buscaCliente($conexao, $id);
$produtos = listaProdutos($conexao);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projek | Novo Prospect</title>

  <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
  <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <link href="../../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="../../../build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/teste.css">
  <script >
    function calcula(){
      var prob = document.getElementById('prob').value;
      var divide = prob/100;
      var valor_op = document.getElementById('valor_op').value; 
      document.getElementById('valor_est').value = parseFloat(divide)*parseFloat(valor_op);
    }
  </script>
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
                      <li><a href="../empresas/markets.php">MARKET</a></li>
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
                <h3>Adicione Market</h3>
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
              <form action="../adiciona/adiciona-prospect.php" method="post" class="form-horizontal form-label-left" novalidate> 
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Empresa<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$cliente['nome']?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label for="prod" class="control-label col-md-3 col-sm-3 col-xs-12">Produto <span class="required">*</span></label>
                  <div class="col-sm-6 col-xs-12 col-md-3">
                  
                    <select id="prod" name="prod" data-validate-linked="prod" class="form-control col-md-4 col-xs-12" required>
                    <?php
                    foreach ($produtos as $produto) {                    
                    ?>
                      <option value="<?=$produto['id_produto']?>"><?=$produto['nome']?></option>
                    <?php
                    }
                    ?>  
                    </select>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="prob">Probabilidade <span class="required">*</span>
                  </label>
                  <div class="col-sm-2 col-xs-12 col-md-1">
                    <select id="prob" name="prob" required data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        <option>%</option>
                          <option value="0">0%</option>
                          <option value="25">25%</option>
                          <option value="50">50%</option>
                          <option value="75">75%</option>
                          <option value="100">100%</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label for="prod" class="control-label col-md-3 col-sm-3 col-xs-12">Valor Oportunidade <span class="required">*</span></label>
                  <div class="col-sm-6 col-xs-12 col-md-2">
                    <input type="text" id="valor_op" name="valor_op" data-validate-linked="prod" class="form-control col-md-4 col-xs-12" onblur="calcula()" required>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="valor_est">Valor Estimado <span class="required">*</span>
                  </label>
                  <div class="col-sm-2 col-xs-12 col-md-2">
                    <input type="text" id="valor_est" name="valor_est" required data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recebimento">Recebimento<span class="required">*</span></label>
                  <div class="col-sm-2 col-xs-12 col-md-2">
                    <input type="date" id=recebimento" name="recebimento" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="fechamento"> Fechamento <span class="required">*</span></label>
                  <div class="col-sm-2 col-xs-12 col-md-2">
                    <input type="date" id=fechamento" name="fechamento" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Cancelar</button>
                  <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
                  <input type="hidden" name="id" id="id" value="<?=$cliente['id']?>" />
                </div>
              </form> 
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
<script src="../../../vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="../../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="../../../vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="../../../vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="../../../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../../../vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../../build/js/custom.min.js"></script>
<!-- Cidades e Estados -->
<script src="../../js/cidades-estados-utf8.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade1'),
    estado: document.getElementById('estado1')
  })
</script>
<script src="../../js/calcula.js">
  
</script>
</body>
</html>
