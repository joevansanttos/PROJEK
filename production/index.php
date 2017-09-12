<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PROJEK</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

</head>
<body>
  <div id="all">
    <div class="container">
       <div class="row">
          <img src="images/botão copiar.png" width="40" right="40" ><span>PROJEK</span>
          <?php
           if(isset($_COOKIE["usuario_logado"])) {
            header("Location: index2.php");?> 
         <?php
           }
         ?>

         
          <form action="php/login/login.php" method="post">
              <div>
                <table class="table">
                  <tr>
                    <td>Email</td>
                    <td><input class="form-control" type="email" name="email"></td>
                  </tr>
                  <tr>
                    <td>Senha</td>
                    <td><input class="form-control" type="password" name="senha"></td>
                  </tr>
                  <tr>
                   <td><button class="btn btn-success">Login</button></td>
                  </tr>
                </table>
              </div>
            </div>
          </form>
       </div>
    </div>
  </div>
  
</body>
</html>

<?php if(isset($_GET["login"]) && $_GET['login']==true) { 
?>   
<?php } ?>

<?php if(isset($_GET["login"]) && $_GET['login']==false) { ?>
   
<?php } ?>