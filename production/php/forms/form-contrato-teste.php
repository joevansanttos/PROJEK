<?php include "conecta.php";?>
<?php include "banco-clientes.php";?>
<?php include "banco-produto.php";?>
<?php include "banco-usuario.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PROJEK</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Sidebar-->      
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index2.php" class="site_title"><img src="images/botão copiar.png" width="40" right="40" ><span>PROJEK</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img2.jpg" alt="..." class="img-circle profile_img">
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
                    <li><a href="contratos.php">CONTRATOS</a></li>                     
                    <li><a href="pos-venda.php">PÓS-VENDA</a></li>
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
              <h3>Clientes</h3>
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
          <!--Page Title-->             
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">                
                <div class="clearfix"></div>
                <div class="x_title">
                  <h2>Formulário do Contrato</small></h2>
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
                <div class="x_content">
                  <br />
                  <form action="adiciona-contrato.php"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <?php
                    $produtos = listaProdutos($conexao);
                    $clientes = listaClientes($conexao);              
                    ?>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nº Contrato <span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" id="n_contrato" name="n_contrato" required="required" class="form-control" data-inputmask="'mask' : '****-****-****-****-****-***'">
                     </div>
                    </div>                    
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Empresa<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">                         
                       <select class="form-control col-md-7 col-xs-12">
                         <?php
                         foreach ($clientes as $cliente){  
                           ?>
                           <option><?=$cliente['nome']?></option>
                           <?php
                         }
                         ?>
                       </select>

                     </div>
                    </div>
                     <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome Fantasia <span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" id="fantasia" name="fantasia" required="required" class="form-control col-md-7 col-xs-12">
                     </div>
                    </div>
                    <div class="item form-group">
                     <label for="cnpj" class="control-label col-md-3 col-sm-3 col-xs-12">CNPJ <span class="required">*</span></label>
                     <div class="col-sm-6 col-xs-12 col-md-2">
                       <input id="cnpj" value="<?=$cliente['cnpj']?>" type="text" name="cnpj" data-validate-linked="cnpj" class="form-control col-md-2 col-xs-12" required="required">
                     </div>
                    </div>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Sede <span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" id="sede" name="sede" value="<?=$cliente['endereco']?>" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                     </div>
                    </div>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Administrador<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input id="administrador" name="administrador" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="administrador" required="required" type="text">
                     </div>
                    </div>
                    <div class="item form-group">
                     <label for="cpf" class="control-label col-md-3 col-sm-3 col-xs-12">CPF do Administrador <span class="required">*</span></label>
                     <div class="col-sm-6 col-xs-12 col-md-2">
                       <input id="cpf" type="text" name="cpf" data-validate-linked="cpf" class="form-control col-md-2 col-xs-12" required="required">
                     </div>
                    </div>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Residência do Administrador<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" id="residencia" name="residencia" required="required" class="form-control col-md-7 col-xs-12">
                     </div>
                    </div>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Produto<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <select class="form-control col-md-7 col-xs-12">
                         <?php
                         foreach ($produtos as $produto){  
                           ?>
                           <option ><?=$produto['nome']?></option>
                           <?php
                         }
                         ?>  
                       </select>
                     </div>
                    </div>
                    <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="consultor">Consultor<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <select class="form-control col-md-7 col-xs-12">
                         <?php
                         $usuarios = listaUsuarios($conexao);
                         foreach ($usuarios as $usuario){ 
                           if($usuario["profissao"] == 'Consultor'){
                             ?>

                             <option ><?=$usuario['nome']?></option>
                             <?php
                           }
                         }
                         ?>  
                       </select>
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
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Cancelar</button>
                          <button type="submit" class="btn btn-success">Enviar</button>
                          <input type="hidden" name="id_consultor" id="id_consultor" value="<?=$usuario['id']?>" />
                          <input type="hidden" name="id_cliente" id="id_cliente" value="<?=$cliente['id']?>" />
                          <input type="hidden" name="nome" id="nome" value="<?=$cliente['nome']?>" />
                          <input type="hidden" name="id_produto" id="id_produto" value="<?=$produto['id']?>" />
                        </div>
                    </div>  
                 </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- jquery.inputmask -->
  <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>
  <script src="js/datatable.js"></script>  
</body>
</html>
