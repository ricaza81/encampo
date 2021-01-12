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
   <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/sistemalaravel.css">

      <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

   <link href="{{ url('/css/main.css') }}" rel="stylesheet">

  
  

  </head>

  <body  data-spy="scroll" data-offset="0" data-target="#navigation">

<div class="col-md-3"></div>
        <div class="col-md-3 text-right"> <br> <br><br><br>
         
             <h style="font-size:50px;color:#fff;line-height:45px;float:right">Agronielsen <b>en Campo</b></h><br><br><br><br>
                            <div class="box-body">
                                  <h1 class="white typed" style="color:#fff" id="msj_agronielsen">
                                 
                                  </h1>
                        <span class="typed-cursor">|</span>
                    <br>


               </div>
          </div>

<div class="col-md-6">

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo"> <img src="https://www.agronielsen.com/encampo//public/imagenes/sdclogo.png" style="height: auto; width: auto; max-width: 300px; max-height: 300px;">
      
        
      </div><!-- /.login-logo -->
        <div class="login-box-body">
        <p class="login-box-msg">Ingresa al Sistema</p>

<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Bienvenido!</h4>
                En este sencillo sistema, podrás administrar las visitas técnicas y recomendación de productos wn campo a tus Agricultores.
              </div>

<?php
 if ($msj==!"") { ?>
           <div ><label style='background-color: #FFEDED;
border: 1px dashed #FA206A;
padding: 8px;
margin-bottom: 10px; font-family: Arial; font-size:12px; width:100%;color:#000'><?php  echo $msj; ?>  </label>  </div>
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

<label class="form-group has-feedback">
<a href="register" class="btn btn-block btn-success">Registrate Gratis</a>
</label>






          </div>
        </form>

     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
    <script src="https://www.agronielsen.com/encampo/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="https://www.agronielsen.com/encampo/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://www.agronielsen.com/encampo/public/plugins/iCheck/icheck.min.js"></script>
   

  <script src="{{url('/plugins/jQuery/jquery.min.js')}}"></script>
  <script src="{{ url('/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{ url('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

  <script src="{{ url('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
  <script src="{{ url('/plugins/fastclick/fastclick.js')}}"></script>
  <script src="{{ url('/js/owl.carousel.min.js') }}"></script>
  <script src="{{ url('/js/jquery.onepagenav.js') }}"></script>

  <script src="{{url('/js/typewriter.js')}}" type="text/javascript"></script>
  <script src="{{url('/js/typed.js')}}" type="text/javascript"></script>
  <script src="{{url('/js/main.js')}}" type="text/javascript"></script>
  <script src="{{ url('/js/sistemalaravel.js') }}" type="text/javascript"></script>




  <script type="text/javascript">
  $(function(){
        $(".typed").typed({
            strings: ["Una nueva solución para fortalecer tus oportunidades comerciales.", "Solo 4 sencillos pasos:","1. Crea tus agricultores", "2. Crea las fincas","3. Registra tu visita","4. Agrega los productos recomendados","y Listo."],
            typeSpeed: 50,
        });
    });
</script>




 


  </body>
</html>