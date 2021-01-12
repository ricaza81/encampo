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
 <script src="{{ url('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>


 

<style>
body {#fff};

</style>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" style="color:#000;">Política de tratamiento de Datos</h4>
      </div>
      <div class="modal-body">
        <b>Autorización Utilización de sus datos personales</b><br/>

Apreciado Cliente/Suscriptor:<br/>

Desde los inicios de nuestra relación, hemos recopilado su información de contacto y con ella hemos conformado nuestra base de datos para fines de comunicación relevante, administrativa y comercial exclusivamente.

<br/><br/>En cumplimiento a lo ordenado en los artículos 7 y 10 del Decreto 1377 de 2013 el cual reglamenta la Ley Estatutaria 1581 de 2012 para la protección de datos personales en Colombia, COSMOAGRO S.A. – TRIADA EMA S.A. SUCURSAL COLOMBIA solicita su autorización para conservar sus datos en nuestra base y archivos digitales con el único fin de mantener nuestras relaciones comerciales y continuar enviándole información relevante acerca de nuestros productos, descuentos, actividades, servicios, noticias y programas.

<br/><br/>Si está de acuerdo en continuar en la base de datos de COSMOAGRO S.A. – TRIADA EMA S.A. SUCURSAL COLOMBIA, por favor active la casilla de verificación donde nos permite usar sus datos personales una vez conocida nuestra política de tratamiento de datos.

Los datos personales serán utilizados exclusivamente para el fin antes mencionado.

Mil gracias por su atención.

Cordial saludo,<br/><br/>
COSMOAGRO S.A.<br/>
NIT # 891.304.818-6
TRIADA EMA S.A. SUCURSAL COLOMBIA.<br/>
NIT # 815.003.461-2<br/>
servicio.cliente@cosmoagro.com<br/>
Zona Franca del Pacífico Manzana B-16 Km. 6 Vía Yumbo – Aeropuerto, Palmira – Valle del Cauca. 
<br/>Teléfonos: 57(2) 2800660 o a través de la página www.cosmoagro.com.
      </div>
    </div>
  </div>
</div>




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
            <!--    <li class="active"><a href="#home" class="smothscroll">Home</a></li>-->
                <li><a href="#beneficios" class="smothscroll">Beneficios</a></li>
            <!--    <li><a href="#showcase" class="smothScroll">Showcase</a></li> -->
                <li><a href="#showcase" class="smothScroll">Asistencia</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>

    <div id="headerwrap">
        <div class="container">
            <div class="row centered" >
                <label style="color:#fff;"><b>"Con Cosmo-Aguas, garantice el control en sus cultivos"</b> <button type="button" class="btn btn-success" onClick="window.location.href='#showcase'">Solicitar Asistencia</button></label>
                   
                </div>
            </div></div>

    
    <!-- FEATURES WRAP -->

  <section id="columna_bg" name="columna_bg">
    <div id="beneficios">
        <div class="container">
            <div class="row">
                <h1 class="centered"><b>"El seguro de su inver$ión, es el seguro de su aplicación"</b></h1>
                <br>
                <br>
                <div class="col-lg-6 ">
                <div class="vid">
                    <iframe  widht="560" height="315"  src="https://www.youtube.com/embed/40BQYX4NsvQ?rel=0&autoplay=1" frameborder="0" allowfullscreen ></iframe>
                </div>
            </div>
                
                <div class="col-lg-6">
                    <h1><u> Beneficios para su Cultivo:</u> </h1>
                    <br>
                <!-- ACCORDION -->
                    <div class="accordion ac" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                
                                <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <u>Beneficio 1</u></h2>
                                </a>
                            </div><!-- /accordion-heading -->
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                <h3>Hace posible que se realicen mezclas en el tanque, sin que se generen cortes o precipitados.</h3>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
        
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    <h2> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <u>Beneficio 2</u></h2>
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                <h3>Reduce la dureza del agua, permitiendo  mejorar la compatibilidad de la mezcla de agroquímicos al momento de su reacción previo a la aspersión.</h3>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
        
                         <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><u>Beneficio 3</u></h2>
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                <h3>Garantiza pH estable en el tanque de mezcla y durante toda la fumigación.</h3>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
                        
                         <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><u>Beneficio 4</u></h2>
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                <h3>Permite una mejor mezcla al momento de combinar los agroquímicos en su aplicación.</h3>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>            
                    </div><!-- Accordion -->
                        
            <br> </div></div></div></div></div></div>
            </section>

  <section id="showcase" name="showcase">
    <div id="showcase">
        <div class="container">
            <div class="row">

                <h1 class="centered"><b>"El seguro de su aplicación, es el seguro de su inver$ión"</b></h1>
                <br>
                <br>
               
            <div class="col-lg-6 centered">
                <img  src="{{ asset('/imagenes/cosmoaguasbio.png') }}" alt="" style="height: auto;  max-height: 390px;">
            </div>


                <div class="col-lg-6 centered">
<!--<h3>"Háganos su consulta, tenemos más de 70 expertos en mas de 1.500 casos atendidos, que podrán darle una pronta solución a sus necesidades".</h3><br/> -->
 <label style="color:#fff;font-size:150%;font-family:Raleway;font-weight:300;line-height:25px" >"Háganos su consulta, tenemos más de 70 expertos en mas de 500.000 Hectáreas visitadas en el último año, que podrán darle una pronta solución a sus necesidades"</label>

<div id="notificacion_resul_fanu"></div>

            <form id="agregar_lead_landing" method="post"  action="{{ url('/agregar_lead_landing') }}" clas="">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>  
<div class="row ">
<div class="col-lg-6 ">
                <div class="form-group">
                   <!-- <label for="name1">Nombre</label>-->
                    <input type="nombres" name="nombres" class="form-control" id="name" placeholder="A nombre de quién va esta solicitud" p required>
                </div></div>
<div class="col-lg-6 ">
                <div class="form-group">
                   <!-- <label for="name1">Nombre</label>-->
                    <input type="telefono" name="telefono" class="form-control" id="telefono" placeholder="Por favor ingresa tu celular" p required>
                </div>

</div>




                <div class="col-lg-6 ">
                </div></div>
                <div class="form-group">
                  <!--  <label for="email1">Email</label> -->
                    <input type="email" name="email" class="form-control" id="email" placeholder="Por favor ingresa tu email" p required>
                </div>
<div class="row ">
<div class="col-lg-6 ">
              <div class="form-group">
      <!--  <label for="pais">País</label> -->
                      <select name="pais" class="form-control" id="pais" required>
                       <option>País donde te encuentras </option>
                <?php  for($i=0;$i<=count($paises)-1;$i++){  if($paises[$i]->id !=$i){ ?>

                      <option value="<?= $paises[$i]->id  ?>" ><?= $paises[$i]->nombre ?></option>
                      <?php   }} ?>
                      </select>                   
     </div> </div>
<div class="col-lg-6 ">
              <div class="form-group">
      <!--  <label for="pais">País</label> -->
                      <select name="departamento" class="form-control" id="departamento" required>
              <option> Departamento </option>
                        <option value="">Selecciona:</option>
                                     </select>                 
     </div>

 </div>
 </div>

<script>

$(document).ready(function() {
$("#pais").change(function(event){
$.get("departamentos_landing/"+event.target.value+"",function(response,state) {
$("#departamento").empty();
$("#departamento").append("<option value=''>Selecciona un departamento</option>");
for(i=0; i<response.length; i++) {
$("#departamento").append("<option value='"+response[i].id+"'>"+response[i].departamento+"</option>");
                                   }
                                                                 });
                               });
                               });
</script>


<script>  
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("datos_departamento_landing/"+event.target.value+"",function(response,state) {
$("#zona").empty();
var nombre_zona= response[0].idZona;
$("#zona").val(nombre_zona);
                                                                  });
                                         });
                                  });
</script>

<input type="hidden" class="form-control" id="zona" name="zona" placeholder="Zona" value="">



<div class="row ">
<div class="col-lg-6 ">
              <div class="form-group">
      <!--  <label for="pais">País</label> -->
                      <select name="cultivo" class="form-control" id="cultivo" p required>
                       <option> Cultivo </option>
                <?php  for($i=0;$i<=count($cultivos)-1;$i++){  if($cultivos[$i]->id !=$i){ ?>

                      <option value="<?= $cultivos[$i]->id  ?>" ><?= $cultivos[$i]->cultivo ?></option>
                      <?php   }} ?>
                      </select>                  
     </div> </div>
<div class="col-lg-6 ">
              <div class="form-group">
      <!--  <label for="pais">País</label> -->
    <input type="hectareas" name="hectareas" class="form-control" id="hectareas" placeholder="Número de Hectareas" p required>                 
     </div>

 </div>
 </div>


                <div class="form-group">
                <!--    <label>Tu Mensaje</label> -->
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="3" placeholder="Por favor amplienos la información de su cultivo."></textarea>
                </div>




                        <div> 
        <label class="form-group has-feedback">
        <h4><input type="checkbox" name="politica" value="1" id="politica" required><a href="#" data-toggle="modal" data-target="#miModal">
  Aceptas nuestra política de tratamiento de datos
</a> </input></h4>
 
        </div>
                <br>
                <button type="submit" class="btn btn-block btn-success btn-lg">Recibir asistencia</button>
             <!--   <button type="submit" class=" btn btn-block btn-primary btn-lg">{{ trans('adminlte_lang::message.submit') }}</button> -->
            </form>
            </div>

<div class="showcase">
    


           
                </div>
            </div>


                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features --></section>
    
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




    <div id="c">
        <div class="container">
            <p>Desarrollado por: <a href="https://www.aplicatics.co/web" target="_blank">APLICATICS.CO</a></p>
        
        </div>
    </div>



<!-- Bootstrap core JavaScript -->
<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->



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

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1455683887783806'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1455683887783806&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<script>
fbq('track', 'Lead', {
value: 10.00,
currency: 'USD'
});
</script>

</body>
</html>
