<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agronielsen | En Campo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/plugins/iCheck/square/blue.css')}}">

    <link rel="stylesheet" href="{{url('/css/sistemalaravel.css')}}">
    <link rel="stylesheet" href="{{url('/css/material/style.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo"> <img src="{{url('/imagenes/sdclogo.png')}}" style="height: auto; width: auto; max-width: 300px; max-height: 300px;">
            
       </div>
   
      <div class="login-box-body">
        <p class="login-box-msg">Registro Exitoso</p>
         
        <div class='alert alert-info'><label style='color:#fff;font-size:17px;'>
              <?php  echo $msj; ?>
              <div class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                      <a href="login" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Ingresar</a>
                  </div>
              </div>
        </div>
      </div>
    </div>
    </div>
  </body>
  </html>   

    <!-- jQuery 2.1.4 -->
    <script src="{{url('/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('/plugins/iCheck/icheck.min.js')}}"></script>
   

    <script>
      
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

  <script src="{{url('js/sistemalaravel.js')}}"></script>



    