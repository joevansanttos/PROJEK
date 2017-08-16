<?php include "cabecalho.php"?>
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <l


                i><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
               <h1>Cadastro de Usuário</h1>
            </div>
            <div class="x_content">

              <form action="adiciona_usuario.php" method="get" class="form-horizontal form-label-left" novalidate>

                <!--<p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                </p>-->
                <span class="section"></span>


                <div class="item form-group">
                <label for="login" class="control-label col-md-3 col-sm-3 col-xs-12">Login <span class="required">*</span></label>
                  <div class="col-sm-6 col-xs-12 col-md-2">
                    <input id="login" type="text" name="login" data-validate-linked="login" class="form-control col-md-2 col-xs-12" required="required">
                  </div>
                  <label class="control-label col-md-1 col-sm-3 col-xs-12" for="senha">Senha<span class="required">*</span>
                  </label>
                  <div class="col-sm-8 col-xs-12 col-md-3">
                    <input type="password" id="senha" name="senha" required="required" class="form-control col-md-8 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                  <div class="col-sm-6 col-xs-12 col-md-3">
                    <input id="email" type="email" name="email" data-validate-linked="email" class="form-control col-md-2 col-xs-12" required="required">
                  </div>
                  <label class="control-label col-md-1 col-sm-3 col-xs-12" for="sexo">Sexo<span class="required">*</span>
                  </label>
                  <div class="col-sm-8 col-xs-12 col-md-2">
                    <select id="sexo" name="sexo" required class="form-control col-md-8 col-xs-12">
                    <option value="feminino">Feminino</option>
                    <option value="masculino">Masculino</option>
                    <option value="nada">Não Opinar</option>
                    </select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado1">Estado <span class="required">*</span>
                  </label>
                  <div class="col-sm-6 col-xs-12 col-md-2">
                    <select id="estado1" name="estado1" class="optional form-control col-md-7 col-xs-12"></select>
                  </div>

                  <label for="cidade1"class="control-label col-md-1 col-sm-3 col-xs-12">Cidade <span class="required">*</span>
                  </label>
                  <div class="col-sm-6 col-xs-12 col-md-3">
                    <select id="cidade1" name="cidade1" class="form-control col-md-7 col-xs-12" required></select>
                </div>
                </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" name="cancelar" class="btn btn-primary">Cancelar</button>
                    <button id="send" type="submit" name="enviar" class="btn btn-success">Enviar</button>
                  </div>
              </form>



<?php include "footer.php"?>


