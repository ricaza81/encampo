<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
       <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="description" content="El Seguro de su Aplicación">


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title> COSMO-AGUAS | El Seguro</title>

    <!-- Bootstrap core CSS -->
  
   <!-- <link href="{{ url('/css/bootstrap.css') }}" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    
    <link href="{{ url('/css/sistemalaravel.css') }}" rel="stylesheet">
    <link href="{{ url('/css/youtube.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
  <!--  <link rel="stylesheet" href="{{ url('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> -->
    
    <!-- Optional theme -->
<!--    <link rel="stylesheet" href="{{ url('/bootstrap/3.3.6/css/bootstrap-theme.min.css')}}"> -->
     <link href="{{ url('/css/main.css') }}" rel="stylesheet">

    <script src="{{ url('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ url('/js/smoothscroll.js') }}"></script>
    <script src="{{ url('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ url('/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
 <script src="{{ url('/plugins/fastclick/fastclick.js')}}"></script>
 <script src="{{ url('/js/sistemalaravel.js') }}" type="text/javascript"></script>

<style>
body {#fff};

</style>



</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
 <!-- Fixed navbar -->
        <div id="navigation" class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header" height="100px;">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="{{url('/imagenes/logo-cosmoagro-web.png')}}" style="height: auto; width: auto; max-width: 200px; max-height: 200px;"></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="" class="smothscroll"></a></li>

              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>



    
    <!-- FEATURES WRAP -->
    <div id="showcase">
        <div class="container">
            <div class="row">
                <h1 class="centered"><b>"El seguro de su aplicación, es el seguro de su inver$ión"</b></h1>
                <br>
                <br>
                <div class="col-lg-6 ">
                <div class="vid">
                      <iframe  widht="560" height="315"  src="https://www.youtube.com/embed/40BQYX4NsvQ?rel=0&autoplay=1" frameborder="0" allowfullscreen ></iframe>
                </div>
            </div>
                
                <div class="col-lg-6">
                      <?php
 if ($msj==!"") { ?>
           <div > <label style="color:#fff;font-size:150%;font-family:Raleway;font-weight:300;line-height:25px" ><u><?php  echo $msj; ?> </u> </label>  </div>
<?php } ?>

                    <h1>Gracias por Contactarnos:</h1>


                <!-- ACCORDION -->
                    <div class="accordion ac" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <h2>CASO DE ÉXITO</h2>
                                </a>
                            </div><!-- /accordion-heading -->
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                <p>A continuación lo invitamos a descargar nuestro documento técnico, donde compartimos los resultados obtenidos
                                   de la aplicación de Cosmo-Aguas + Cosmo-In d en post cosecha de banano,
                              logrando asegurar la optima calidad de la fruta en el puerto de destino.
<br/>Departamento Técnico y de Mercadeo Cosmoagro S.A.
</p>                            
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
        
<button type="submit" class="btn btn-block btn-success btn-lg" onClick="window.open('http://www.cosmoagro.co/storage/descargables/COSMO_AGUAS_+_COSMO_IN_D_BANANO_COSMOAGRO.pdf')" >Descargar Documento</button>


                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features -->
        </div><!--/ #features -->

       <div id="c">
        <div class="container">
            <p>Desarrollado por: <a href="https://www.aplicatics.co/web" target="_blank">APLICATICS.CO</a></p>
        
        </div>
    </div>
    
    <!--
    <section id="showcase" name="showcase"></section>
    <div id="showcase">
        <div class="container">
            <div class="row">
                <h1 class="centered">Some Screenshots</h1>
                <br>
                <div class="col-lg-8 col-lg-offset-2">
                    <div id="carousel-example-generic" class="carousel slide"> -->
                      <!-- Indicators -->
                 <!--     <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      </ol> -->
                    
                      <!-- Wrapper for slides -->
                    <!--  <div class="carousel-inner">
                        <div class="item active">
                          <img src="assets/img/item-01.png" alt="">
                        </div>
                        <div class="item">
                          <img src="assets/img/item-02.png" alt="">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>    -->
     <!--   </div>--><!-- /container -->
  <!--  </div>   -->


<!--   <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>Address</h3>
                <p>
                Av. Greenville 987,<br/>
                New York,<br/>
                90873<br/>
                United States
                </p>
            </div>
            
            <div class="col-lg-7">
                <h3>Drop Us A Line</h3>
                <br>
                <form role="form" action="#" method="post" enctype="plain"> 
                  <div class="form-group">
                    <label for="name1">Your Name</label>
                    <input type="name" name="Name" class="form-control" id="name1" placeholder="Your Name">
                  </div>
                  <div class="form-group">
                    <label for="email1">Email address</label>
                    <input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Your Text</label>
                    <textarea class="form-control" name="Message" rows="3"></textarea>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>-->







<!-- Bootstrap core JavaScript -->
<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91611124-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Google Code for Pagina de gracias - cosmoaguas Conversion Page -->
<script type="text/javascript">
/ <![CDATA[ /
var google_conversion_id = 862227463;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "fkm2CPmyxm4Qh5iSmwM";
var google_remarketing_only = false;
/ ]]> /

</body>
</html>
