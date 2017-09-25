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
$n_contrato = $projeto['n_contrato'];
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
    <script type="text/javascript"></script>
    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
    <script src="../../../vendors/jquery-tabledit/jquery.tabledit.min.js"></script>
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
                  <div class="clearfix"></div>                
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php
                        foreach ($departamentos_contrato as  $d_contrato) { 
                          $nome_departamento = buscaNomeDepartamento($conexao, $d_contrato['id_departamento']);
                        ?>   
                        <table id="example" class="table table-bordered">
                          <thead>
                             <th colspan="4"><?=$nome_departamento['descricao']?></th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Tarefa</td>
                              <td>Data de Inicio</td>
                              <td>Data do Fim</td>
                            </tr>                            
                            <?php
                             $tarefas_contrato = listaTarefasContrato($conexao, $d_contrato['id_departamento_contrato']);
                             foreach ($tarefas_contrato as $t_contrato) {
                              $tarefa = buscaTarefaNome($conexao, $t_contrato['id_tarefa']);
                            ?> 
                              <tr>
                                <td><?=$tarefa['nome']?></td>
                                <td><?=$t_contrato['data_inicio']?></td>
                                <td><?=$t_contrato['data_fim']?></td>            
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
    <script src="../../../vendors/jquery-tabledit/jquery.tabledit.min.js"></script>
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
    <script type="text/javascript">
      var editor; // use a global for the submit and return data rendering in the examples
       
      $(document).ready(function() {
          editor = new $.fn.dataTable.Editor( {
              ajax: "action.php",
              table: "#example",
              fields: [ {
                      label: "Nome:",
                      name: "nome"
                  }, {
                      label: "Data de Inicio:",
                      name: "data_inicio"
                  }, {
                      label: "Data de Fim:",
                      name: "data_fim"
                  }
              ]
          } );
       
          // Activate an inline edit on click of a table cell
          $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
              editor.inline( this );
          } );
       
          $('#example').DataTable( {
              dom: "Bfrtip",
              ajax: "action.php",
              order: [[ 1, 'asc' ]],
              columns: [
                  {
                      data: null,
                      defaultContent: '',
                      className: 'select-checkbox',
                      orderable: false
                  },
                  { data: "nome" },
                  { data: "data_inicio" },
                  { data: "data_fim" }
              ],
              select: {
                  style:    'os',
                  selector: 'td:first-child'
              },
              buttons: [
                  { extend: "create", editor: editor },
                  { extend: "edit",   editor: editor },
                  { extend: "remove", editor: editor }
              ]
          } );
      } );

    </script>
  </body>
</html>

