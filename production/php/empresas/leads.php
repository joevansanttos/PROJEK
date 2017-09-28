<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-market.php";?>
<?php include "../bancos/banco-lead.php";?>
<?php include "../bancos/banco-usuario.php";?>
<?php include "../logica/logica-usuario.php";?>
<?php include "../alerta/mostra-alerta.php";?>
<?php
  verificaUsuario();
  $email = $_SESSION["usuario_logado"];
  $usuario = buscaUsuarioEmail($conexao, $email);
  $id_usuario = $usuario['id_usuario'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJEK | Leads</title>

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
            <!-- Sidebar Menu-->
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
                      <li><a href="market.php">Market</a></li>
                      <li><a href="leads.php">Leads</a></li>
                      <li><a href="suspects.php">Suspects</a></li>
                      <li><a href="prospects.php">Prospects</a></li>
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
            <!-- end footer menu-->

            <!-- End Sidebar Menu-->   
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
                <h3>Leads</h3>
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
                        <table id="tabela" class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Empresa</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Cargo</th>
                                    <th>Ações</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th>Empresa</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Cargo</th> 
                                    <th></th>                           
                                  </tr>
                                </tfoot>
                                <tbody>
                                  <?php
                                    $leads = listaLeads($conexao);
                                    foreach ($leads as $lead){
                                      $market = buscaMarket($conexao, $lead['id_clientes']);                                
                                   ?>
                                    <tr>
                                      <td><?=$market['nome']?></td>
                                      <td><?=$lead['nome']?></td>
                                      <td><?=$lead['email']?></td>
                                      <td><?=$lead['tel']?></td>
                                      <td><?=$lead['cargo']?></td>                                 
                                      <td align="center">
                                        <a href="../forms/form-lead.php?id=<?=$market['id_market']?>"><button class="btn btn-info btn-xs"><i class="fa fa-plus"></i></button></a>
                                        <a href="../forms/form-suspect.php?id=<?=$lead['id_clientes']?>"><button class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
                                        <a href="../profiles/cliente-profile.php?id=<?=$market['id_market']?>"><button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
                                        <a href="../forms/form-altera-lead.php?id=<?=$lead['id_lead']?>"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a> 
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-file"></i></button> 
                                        <a href="../remove/remove-lead.php?id=<?=$lead['id_lead']?>"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></a>               
                                      </td>
                                      <div id="myModal" class="modal fade" role="dialog" ">
                                        <div class="modal-dialog ">
                                          <!-- Modal content-->
                                          <div class="modal-content" >
                                            <form  role="form" action="../adiciona/adiciona-historico.php" method="post" >
                                              <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Novo Histórico</h4>
                                              </div>
                                              <div class="modal-body " style="min-width: 100%" >
                                                <div class="form-group" >
                                                <label for="recipient-name" class="control-label">Comentário</label>   
                                                <textarea class="form-control" name="comentario" ></textarea>
                                                </div>
                                                <div class="form-group"> 
                                                <label for="recipient-name" class="control-label">Consultor</label>
                                                <select name="id_consultor" class="form-control">
                                                 <?php
                                                 $usuarios = listaUsuarios($conexao);
                                                 foreach ($usuarios as $usuario){ 
                                                   if($usuario["id_profissao"] == '1'){
                                                     ?>
                                                     <option value="<?=$usuario['id_usuario']?>" ><?=$usuario['nome']?><?=' '?><?=$usuario['sobrenome']?></option>
                                                     <?php
                                                   }
                                                 }
                                                 ?>  
                                                </select>        
                                                </div>                                  
                                                </div>
                                                <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                                            
                                              <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
                                              <input type="hidden" name="id_market" id="id_market" value="<?=$market['id_market']?>" />
                                              </div>
                                            </form>  
                                          </div>
                                        </div>
                                      </div>
                                    </tr>
                                  <?php                                
                                    }
                                  ?>
                                </tbody>                        
                        </table>
                        
                        <div class="ln_solid"></div>
                          <a class="btn  btn-default" style="" href="../empresas/market.php?"><i class="fa fa-plus"></i></a>
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
    <script src="../../js/datatable.js">
    </script> 
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
  </body>
</html>
