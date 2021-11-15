<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=media();?>/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=media();?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <title>Login - Hotel Norma</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Hotel Norma</h1>
      </div>
      <div class="login-box flipped">
    

        <form class="forget-form" id="formPasswordReset2" name="formPasswordReset" action="">
          <input type="hidden" id="idUsuario2" name="idUsuario2" value="<?= $data['idusuario']; ?>" required>
          <input type="hidden" id="txtEmail" name="txtEmail" value="<?= $data['correo']; ?>" required>
          <input type="hidden" id="txtToken" name="txtToken" value="<?= $data['token']; ?>" required>
          <h3 class="login-head"></i> Cambiar contraseña </h3>
          <div class="form-group">
            <input class="form-control" type="password" id="txtPassword2" name="txtPassword2" placeholder="Nueva contraseña">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" id="txtPasswordConfirm2" name="txtPasswordConfirm2" placeholder="Confirmar contraseña">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Resetear</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar al login</a></p>
          </div>
        </form>
      </div>
    </section>
    <script>

          const base_url = "<?= base_url(); ?>";

    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?=media();?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=media();?>/js/popper.min.js"></script>
    <script src="<?=media();?>/js/bootstrap.min.js"></script>
    <script src="<?=media();?>/js/main.js"></script>
    <script src="<?=media();?>/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="<?= media();?>/js/<?=$data['page_function_js']?>"></script>
    
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?=media();?>/js/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>





