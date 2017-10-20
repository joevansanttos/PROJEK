<?php 
  header('Content-Type: text/html; charset=utf-8'); 
  error_reporting(E_ALL ^ E_NOTICE);
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-market.php";
  require_once "../bancos/banco-profissao.php";
  require_once "../bancos/banco-usuario.php";
  require_once "../logica/logica-usuario.php";
  require_once "../alerta/mostra-alerta.php";
  verificaUsuario();
  $email = $_SESSION["usuario_logado"];
  $usuario = buscaUsuarioEmail($conexao, $email);
  $id_usuario = $usuario['id_usuario'];
  $portes = listaPortes($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Projek | Novo Market</title>

  <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
  <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <link href="../../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="../../../build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/teste.css">

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
                <?php                  
                  $sql = "SELECT * FROM profileimg WHERE id_usuario = $id_usuario";
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
                <h2><?=$usuario['nome']?></h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">                
                <ul class="nav side-menu">
                  <?php
                    if($usuario['id_profissao'] != 4){
                  ?>
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
                  <?php
                    }
                  ?>
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
                  <?php
                    if($usuario['id_profissao'] != 4){
                  ?>
                  <li><a><i class="fa fa-table"></i> Consultoria <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../consultoria/projetos.php">Projetos</a></li>                     
                    </ul>
                  </li>
                  <?php
                    }
                  ?>
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
                  <li><a href="../../logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
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
                <h3>Novo Cliente</h3>
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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_content">
                    <form action="../adiciona/adiciona-cliente.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class=" form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
                          <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
                          <input type="hidden" name="id_consultor" id="id_consultor" value="<?=$usuario['id_usuario']?>" />
                        </div>
                      </div>
                    </form>
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
<script src="../../js/cidades-estados2-utf8.js"></script>
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

<script src="../../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<!-- Autosize -->
<script src="../../../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../../../vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../../build/js/custom.min.js"></script>
<!-- Cidades e Estados -->
<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade1'),
    estado: document.getElementById('estado1')
   
  })
</script>
</body>
</html>
