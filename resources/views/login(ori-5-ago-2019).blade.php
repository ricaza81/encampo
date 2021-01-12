  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>En Campo | Log in</title>




    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/css/ionicons.min.css">
      <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/appx/dependencies/simple-line-icons/css/simple-line-icons.css" type="text/css">
    <!-- Theme style -->
   <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/sistemalaravel.css">



   <link href="https://www.agronielsen.com/encampo/public/css/main.css" rel="stylesheet"> 

   <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css">
   
        <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/appx/dependencies/font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/pe-icon-7-stroke.css">


    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
  
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>


  </head>

  <body class="mini-sidebar">


    <section id="wrapper" class="login-register login-sidebar" style="background-image: url(https://www.agronielsen.com/encampo/public/imagenes/field-min.jpg);height;10%">
   



        <div class="col-md-8 text-right"> 
 
            <div class="agronielsen" id="agronielsen" style="padding-top:20px;font-size:30px;color:#fff;line-height:35px;float:right">Agronielsen <b>en Campo</b> <br> <br>

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="" style="width:80%" src="../public/imagenes/map-agronielsen.png">
      </div>

          <div class="ajuste-caption">"No importan los formatos,</div>
          <div class="ajuste-caption">Lo que importa son los datos que tienen esos formatos."</div>



    </div>

  </div>
</div>

              


                   
               
               </div>
          </div>
<!--variable-->

        
        <div class="login-box card">
            <div class="card-body">



 


                         <form id="login" action="login" class="form-horizontal form-material" method="post">
                     
                                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
                                    <h3 class="box-title m-t-40 m-b-0">Ingresa al Sistema</h3>

                    <?php
                     if ($msj==!"") { ?>
                               <div style="background-color: #f2dede;border-color: #ebcccc;color: #a94442;padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;"><?php  echo $msj;?></div>
                    <?php } ?>
                                
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
                                       <input id="checkbox-signup" type="checkbox" name="remember">
                                        <label for="checkbox-signup"> Recordarme </label>
                                      </div>
                                     <div class="ml-auto">
                                        <a href="password" id="to-recover" class="text-muted"><i class="fa fa-lock"></i> Olvido su contraseña?</a> 
                                     </div>
                                  </div>


                            <div class="form-group text-center m-t-20">
                              <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
                                <a href="register" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Registrarme</a>
                              </div>
                            </div>
  <style>
              .or {
    position: relative;
    width: 100%;
    height: 1px;
  
    background-color: #e6ecf5;
    color:#000;
}
</style>
                           <div class="row">
                                 <div class="or"></div>
                             <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                  <label>Ó Ingresa con Facebook</label>
                                <div class="social">
                                     <a href="redirect" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                </div>
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
<script src="https://www.agronielsen.com/encampo/public/plugins/jQuery/jquery.min.js"></script>
<script src="https://www.agronielsen.com/encampo/public/js/jquery-3.2.1.slim.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://www.agronielsen.com/encampo/public/plugins/iCheck/icheck.min.js"></script>
   

  
  <script src="https://www.agronielsen.com/encampo/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>

  


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

.carousel-item {
position: relative;
    display: none;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    transition: -webkit-transform .6s ease;
    transition: transform .6s ease;
    transition: transform .6s ease,-webkit-transform .6s ease;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-perspective: 1000px;
    perspective: 1000px;
    padding:0px 20px 20px 20px; }

    .carousel-caption {
    position: absolute;
    right: 15%;
    bottom: 20px;
    left: 15%;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #fff;
    text-align: center;
              }

              
              
              .ajuste-caption {margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;
    font-size: 1.25rem;
}


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

    .bd-example {
padding: 0rem;
    margin-right: 0;
    margin-bottom: 0;
    margin-left: 0;
    border-width: 0rem;
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
    background:#079849;
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

