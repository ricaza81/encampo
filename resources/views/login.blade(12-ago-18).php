  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>En Campo | Log in</title>



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

  <body class="mini-sidebar">


    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(https://www.agronielsen.com/encampo/public/imagenes/ec.JPG);">



    <div class="col-md-3"></div>
        <div class="col-md-3 text-right"> 
 
 <!--variable-->       
             <div class="agronielsen" id="agronielsen" style="padding-top:80px;font-size:50px;color:#fff;line-height:45px;float:right">Agronielsen <b>en Campo</b> <br> <br>
              <a href="register" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Registrarme</a>
                           
                                  <div class="white typed" style="padding-top:20px;font-size:35px;color:#fff;line-height:32px;font-weight:700" id="type">                                 
                                  </div>
                                <span class="typed-cursor"></span>

                   
               
               </div>
          </div>
<!--variable-->

        
        <div class="login-box card">
            <div class="card-body">

                    <?php
                     if ($msj==!"") { ?>
                               <div ><label style='background-color: #FFEDED;
                    border: 1px dashed #FA206A;
                    padding: 8px;
                    margin-bottom: 10px; font-family: Arial; font-size:12px; width:100%;color:#000'><?php  echo $msj; ?>  </label>  </div>
                    <?php } ?>

 
        <a  class="text-center db"><img src="https://www.agronielsen.com/encampo/public/imagenes/logo-agronielsen-presentacion.png"  style="height: auto; width: auto; max-width: 154px; max-height: 98px;" alt="Home"></a> 

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


                            <div class="form-group text-center m-t-20">
                              <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
                              </div>
                            </div>


                             <div class="form-group m-b-0">
                                <div class="col-sm-12 text-center">No tienes una cuenta?<a href="register" class="text-primary m-l-5"><b>Registrate sin costo</b></a>
                               </div>
                            </div>

                     </form>


            </div>
        </div>
    </section>
    </body>







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
 //   $(".agronielsen").hide(); 
$(function(){
$(".agronielsen").hide(); 
$(window).resize(function() {
if (window.innerWidth > 800) {
$(".agronielsen").show(); }
else { $(".agronielsen").hide(); 
}
});
});
</script>

<script type="text/javascript">
$(function($){
        if ($(window).width()>800) {
                $(".agronielsen").show(); }
else { $(".agronielsen").hide();
                                    }
});
</script>




<script type="text/javascript">
  $(function(){
        $(".typed").typed({
            strings: ["Una nueva solución para fortalecer tus oportunidades comerciales.", "Solo 4 sencillos pasos:","1. Crea tus agricultores", "2. Crea las fincas","3. Registra tu visita","4. Agrega los productos recomendados","y Listo.","Comienza ahora"],
            typeSpeed: 50,
        });
    });
</script>

</script>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?1hj6nSgRMmQTw1IIAZArYiuchzQzXvjj";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>






<style>
.card-body {
    padding: 3.5rem; 
background:#fff;}
</style>

<style>
.btn-info,
.btn-info.disabled {
  background: #1e88e5;
  border: 1px solid #1e88e5;
  -webkit-box-shadow: 0 2px 2px 0 rgba(66, 165, 245, 0.14), 0 3px 1px -2px rgba(66, 165, 245, 0.2), 0 1px 5px 0 rgba(66, 165, 245, 0.12);
  box-shadow: 0 2px 2px 0 rgba(66, 165, 245, 0.14), 0 3px 1px -2px rgba(66, 165, 245, 0.2), 0 1px 5px 0 rgba(66, 165, 245, 0.12);
  -webkit-transition: 0.2s ease-in;
  -o-transition: 0.2s ease-in;
  transition: 0.2s ease-in;
  font-size: 26px }
  .btn-info:hover,
  .btn-info.disabled:hover {
    background: #1e88e5;
    border: 1px solid #1e88e5;
    -webkit-box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2);
    box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2); }
  .btn-info.active, .btn-info:focus,
  .btn-info.disabled.active,
  .btn-info.disabled:focus {
    background: #028ee1;
    -webkit-box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2);
    box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2); }
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
.login-box{
    background-color: #fff;
    opacity: 0.9;
}
.login-box:hover{
    background-color: #fff;
    opacity: 1;
}
</style>

<style>
.login-sidebar{
    opacity: 0.9;
}
.login-sidebar:hover{
    opacity: 1;
}
</style>

<style>
.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: -15px;
    margin-bottom: 13px;
}
</style>

<style>

.card {

    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;

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
}
</style>

