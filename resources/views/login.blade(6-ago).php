  <head>


    <title>En Campo | Log in</title>

   
    <!-- Tell the browser to be responsive to screen width -->

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/bootstrap/css/bootstrap.min.css">
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

   <link href="https://www.agronielsen.com/encampo/public/css/main.css" rel="stylesheet"> 

   <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css">



  </head>


    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(https://www.agronielsen.com/encampo/public/imagenes/login-register.jpg);">



    <div class="col-md-3"></div>
        <div class="col-md-3 text-right"> <br> <br><br><br>
         
             <div style="font-size:50px;color:#fff;line-height:45px;float:right">Agronielsen <b>en Campo</b></div><br><br><br><br>
                            <div class="box-body">
                                  <h1 class="white typed" style="color:#fff" id="msj_agronielsen">
                                 
                                  </h1>
                        <span class="typed-cursor"></span>
                    <br>


               </div>
          </div>



        
        <div class="login-box1 card">
            <div class="card-body">


 
        <a  class="text-center db"><img src="https://www.agronielsen.com/encampo/public/imagenes/logo-agronielsen-presentacion.png"  style="height: auto; width: auto; max-width: 154px; max-height: 98px;" alt="Home"></a> 
                    <?php
                     if ($msj==!"") { ?>
                               <div ><label style='background-color: #FFEDED;
                    border: 1px dashed #FA206A;
                    padding: 8px;
                    margin-bottom: 10px; font-family: Arial; font-size:12px; width:100%;color:#000'><?php  echo $msj; ?>  </label>  </div>
                    <?php } ?>
        <form id="login" action="login" class="form-horizontal form-material" method="post">
                     
                                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
                                    <h3 class="box-title m-t-40 m-b-0">Ingresa al Sistema</h3>
                                
                                  <div class="form-group m-t-20">
                                    <div class="col-xs-12">
                                         <input class="form-control" type="email" required="" placeholder="Email" name="email">
                                     </div>
                                  </div>
                                
                                  <div class="form-group m-t-20">
                                   <div class="col-xs-12">                            
                                     <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                   </div>
                                  </div>
                                <div class="form-group">
                                    <div class="d-flex no-block align-items-center">
                                      <div class="checkbox checkbox-primary p-t-0">
                                       <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup"> Recordarme </label>
                                     </div>
                                     <div class="ml-auto">
                                        <a href="password" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> Olvido su contraseña?</a> 
                                     </div>
                                  </div>
                                  </div>

                            <div class="form-group text-center m-t-20">
                              <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
                              </div>
                            </div>


                            <div class="form-group m-b-0">
                                <div class="col-sm-12 text-center">
                                No tienes una cuenta? <a href="register" class="text-primary m-l-5"><b>Registrate sin costo</b></a>
                               </div>
                            </div>

                     </form>


             </div>
        </div>
    </section>




<!-- jQuery 2.1.4 -->
    <script src="https://www.agronielsen.com/encampo/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="https://www.agronielsen.com/encampo/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://www.agronielsen.com/encampo/public/plugins/iCheck/icheck.min.js"></script>
   

  <script src="https://www.agronielsen.com/encampo/public/plugins/jQuery/jquery.min.js"></script>
  <script src="https://www.agronielsen.com/encampo/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="https://www.agronielsen.com/encampo/public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

  <script src="https://www.agronielsen.com/encampo/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="https://www.agronielsen.com/encampo/public/plugins/fastclick/fastclick.js"></script>
  <script src="https://www.agronielsen.com/encampo/public/js/owl.carousel.min.js"></script>
  <script src="https://www.agronielsen.com/encampo/public/js/jquery.onepagenav.js"></script>

  <script src="https://www.agronielsen.com/encampo/public/js/typewriter.js" type="text/javascript"></script>
  <script src="https://www.agronielsen.com/encampo/public/js/typed.js" type="text/javascript"></script>
  <script src="https://www.agronielsen.com/encampo/public/js/main.js" type="text/javascript"></script>
  <script src="https://www.agronielsen.com/encampo/public/js/sistemalaravel.js" type="text/javascript"></script>




  <script type="text/javascript">
  $(function(){
        $(".typed").typed({
            strings: ["Una nueva solución para fortalecer tus oportunidades comerciales.", "Solo 4 sencillos pasos:","1. Crea tus agricultores", "2. Crea las fincas","3. Registra tu visita","4. Agrega los productos recomendados","y Listo."],
            typeSpeed: 50,
        });
    });
</script>

   <style>
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding:3.50rem;
}
</style>

<style>
.login-box1 {
    right: 0px;
    position: absolute;
    height: 100%;
}
</style>

<style>
.align-items-center {
    -ms-flex-align: center!important;
    align-items: center!important;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}
</style>

<style>
.ml-auto, .mx-auto {
    margin-left: auto!important;
}
</style>

<style>
.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
</style>

<style>
.login-box1 {
    width: 400px;
    margin: 0 auto;
    position: absolute;
}
</style>

<style>
   body {
    background-color: #f2f2f2;
    font-family: "Lato";
    font-weight: 300;
    font-size: 16px;
    color: #555;
    padding-top: 0px;
    -webkit-font-smoothing: antialiased;
    -webkit-overflow-scrolling: touch;
</style>

