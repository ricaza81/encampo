<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>En Campo | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://www.agronielsen.com/mkt/public/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://www.agronielsen.com/mkt/public/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="https://www.agronielsen.com/mkt/public/css/sistemalaravel.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo"> <img src="https://www.agronielsen.com/mkt/public/imagenes/sdclogo.png" style="height: auto; width: 200px; max-width: 200px; max-height: 300px;">
        <a href="#"><b><br/>En Campo</b></a>
        
      </div><!-- /.login-logo -->
        <div class="login-box-body">
        <p class="login-box-msg">Ingresa al Sistema</p>

<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Bienvenido!</h4>
                En este sencillo sistema, podrás administrar las visitas técnicas y recomendación de productos a tus Agricultores.
              </div>

<?php
 if ($msj==!"") { ?>
           <div ><label style='background-color: #FFEDED;
border: 1px dashed #FA206A;
padding: 8px;
margin-bottom: 10px; font-family: Arial; font-size:12px; width:100%'><?php  echo $msj; ?>  </label>  </div>
<?php } ?>
        
        <form id="login" action="login" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   

          <div class="form-group has-feedback">

                <input type="email" class="form-control" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
<div> 
<label class="form-group has-feedback">
<input type="checkbox" name="remember" value="1"> Recordarme
</label>
</div>

<div ><label class="form-group has-feedback">
<a href="password">Olvidé mi contraseña</a>
</label></div>

          <div class="row">
            

            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div><!-- /.col -->
         
<div> 

<!--<label class="form-group has-feedback">
<a href="register" class="btn btn-block btn-success">Registrate Gratis</a>
</label>-->






          </div>
        </form>

     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
    <script src="https://www.agronielsen.com/mkt/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="https://www.agronielsen.com/mkt/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://www.agronielsen.com/mkt/public/plugins/iCheck/icheck.min.js"></script>
   

    <script>
      
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

  <script src="https://www.agronielsen.com/mkt/public/js/sistemalaravel.js"></script>


  </body>
</html>