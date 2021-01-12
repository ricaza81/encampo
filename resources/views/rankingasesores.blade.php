<!DOCTYPE html>
<html lang="es">
<head>

  <title>DirectodeFinca.com</title>

  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Main Font -->
  <script src="{{url('css/olympus/app/js/webfontloader.min.js')}}"></script>
  <script>
    WebFont.load({
      google: {
        families: ['Roboto:300,400,500,700:latin']
      }
    });
  </script>
    <meta name="description" content="Vende directo, con menos intermediarios">
    <meta name="keywords" content="venta directa, venta desde la finca, comercialización directa, visitas, agrícola, integración, automatización,mercado agrícola,visitas técnicas,gestor de visitas técnicas, fertilizantes foliares, fertilizantes, foliares,abonos">
    <link rel="author" href="http://www.directodefinca.com" />
    <link rel="canonical" href="http://www.directodefinca.com"/>
    <!-- FB Meta tags -->
    <meta property="og:title" content="Directo de Finca: Por un campo más justo"/>
    <meta property="og:type" content="website"/>
      <meta property="og:image" content="http://www.directodefinca.com/public/css/olympus/dfpreviewapp.jpg"/>
    <meta property="og:url" content="http://www.directodefinca.com"/>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{url('css/olympus/app/Bootstrap/dist/css/bootstrap-reboot.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/olympus/app/Bootstrap/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/olympus/app/Bootstrap/dist/css/bootstrap-grid.css')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/faviconnielsen.png">  
  <!-- Main Styles CSS -->
  <link rel="stylesheet" type="text/css" href="{{url('css/olympus/app/css/main.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{url('css/olympus/app/css/fonts.min.css')}}">



</head>

<body class="landing-page">





  <div class="main-header">


  <div class="content-bg-wrap bg-account"></div>
               <div class="container">
                <div class="row">

                      <div class="header--standard-wrap">

<a href="landing" class="main-logo"><img src="https://www.agronielsen.com/encampo/public/css/appx/assets/img/logoagronielsenencampo.png" alt="Agronielsen en Campo" style="    margin-top: -127px;"></a>

              </div>
                  <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                    <div class="main-header-content">
                      <h1>Hola: <b></b></h1>
                         <h3 >Estos son nuestros Asesores Técnicos Recomendados:
                        </h3><br/>
                    </div>
                  </div>
                </div>
              </div>
              </div>
</div>




<div class="container">
  <div class="row">
<div class="col col-lg-12 col-md-12 col-sm-12 col-12">

  <div class="clients-grid">
      <div class="row sorting-container" id="clients-grid-1" data-layout="masonry" style="position: relative; height: 2161.75px;">

    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12  sorting-item ecommerce natural" style="position: absolute; left: 0%; top: 0px;">
                      <div class="page-description" style="background:#76A82B">
                                <div class="icon">
                                  <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Mejores Posibilidades"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use></svg>
                                </div>
                                <span style="color:#fff">Ranking de Asesores Técnicos:</span>
                      </div>

<?php
 foreach($usuarios as $usuario)
 $visitasusuario=count($usuario->visitatecnica)

        ?>

                 <?php 
                             foreach($usuarios->slice($visitasusuario) as $usuario){
                             $numerador=count($usuario->visitatecnica)*0.6+$usuario->cantcultivos($usuario->id)*0.2+count($usuario->fincas)*0.2;
$divisor=count($visitas)+$usuario->cantcultivos($usuario->id)+count($usuario->fincas);

if ($divisor==NULL)
{
$ranking=0;}
else {
$ranking=($numerador/$divisor)*100;
 }  ?>

       <?php if ($ranking>0){   ?>
                              <div class="ui-block">
                                <div class="birthday-item inline-items badges">
                                   <div class="birthday-author-name">
                                           <a href="#" class="h6 author-name">Asesor Técnico: <?=$usuario->nombres?> <?=$usuario->apellidos?></a>
                                         <div class="birthday-date">Número de Asistencias Técnicas: <?=count($usuario->visitatecnica)?>
                                         </div>
                                         <div class="birthday-date">Número de Cultivos asistidos: <?=$usuario->cantcultivos($usuario->id)?>
                                         </div>
                                         <div class="birthday-date">Número de Fincas Asistidas: <?=count($usuario->fincas)?></div>
                                         <div class="birthday-date">Cultivo Principal: <?=$usuario->cultivoprincipal($usuario->id)?>
                                         </div>
                                         </div>
                                         <div class="skills-item" style="background:#fff">
                                         <div class="birthday-date responsive" style="font-size:12px">Ranking: <?=number_format($ranking,1)?>%
                                         </div>
                                         <div class="skills-item-meter responsive">
                                            <span class="skills-item-meter-active skills-animate" style="width: <?=$ranking?>%; opacity: 1;"></span>
                                         </div>
                                   </div>
                                </div>
                              </div>
                        <?php } ?>
                   <?php }  ?>
 </div>


    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12  sorting-item worlds family politics" style="position: absolute; left: 50%; top: 0px;">

    <div class="ui-block">
              
           <div id="accordion" role="tablist" aria-multiselectable="true" class="accordion-faqs" style="padding:30px">
            <div class="card">
              <div class="card-header" role="tab" id="headingOne">
                <h3 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Cómo se obtiene el Ranking de cada asesor?
                    <span class="icons-wrap">
                      <svg class="olymp-plus-icon"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-plus-icon')}}"></use></svg>
                      <svg class="olymp-accordion-close-icon"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-accordion-close-icon')}}"></use></svg>
                    </span>
                  </a>
                </h3>
              </div>
        
            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
              <p>
               El Ranking de cada asesor técnico se calcula en función de 3 variables principales:
               <li>1. Número de visitas técnicas realizadas,</li>
               <li>2. Número de cultivos asistidos,</li>
               <li>3. Cantidad de fincas asistidas.</li>
              </p>
        
              <p>
                Estas variables se interrelacionan con la gestión global de Agronielsen en Campo, permitiendo obtener parámetros en función de todo el sistema.
              </p>
            </div>
   

            <div class="card-header" role="tab" id="headingOne-1">
              <h3 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                  Por qué es importante esta clasificación?
                  <span class="icons-wrap">
                           <svg class="olymp-plus-icon"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-plus-icon')}}"></use></svg>
                      <svg class="olymp-accordion-close-icon"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-accordion-close-icon')}}"></use></svg>
                          </span>
                </a>
              </h3>
            </div>
        
            <div id="collapseOne-1" class="collapse" role="tabpanel" aria-labelledby="headingOne-1">
              <p>
                El principal objetivo de la asistencia técnica, es contribuir a una mayor productividad de los cultivos, y la generación de mejores beneficios para el Agricultor.
              </p>
        
              <p>
               Para lograr esta meta, es fundamental contar con profesionales de la agronomía con gran experiencia en campo, para generar soluciones efectivas a las necesidades de los Productores. Agronielsen en Campo, simplemente válida esa expertice para una mejor información de los Agricultores.
              </p>
            </div>
    

            <div class="card-header" role="tab" id="headingOne-2">
              <h3 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                  Cómo contactar un Asesor?
                  <span class="icons-wrap">
                           <svg class="olymp-plus-icon"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-plus-icon')}}"></use></svg>
                      <svg class="olymp-accordion-close-icon"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-accordion-close-icon')}}"></use></svg>
                          </span>
                </a>
              </h3>
            </div>
        
            <div id="collapseOne-2" class="collapse" role="tabpanel" aria-labelledby="headingOne-2">
              <p>
                Es práctico y sencillo, solo registrate como Agricultor en nuestro portal aliado <a href="http://www.directodefinca.com" target="_blank"><b>DirectodeFinca.com</b></a>
              </p>
        
              <p>
                Luego de registrarte, simplemente vas a la sección: Asesores Técnicos.
              </p>
            </div>


        </div>
      </div>
    </div>


<script src="{{url('css/olympus/app/js/jquery-3.2.1.js')}}"></script>
<script src="{{url('css/olympus/app/js/jquery.appear.js')}}"></script>
<script src="{{url('css/olympus/app/js/jquery.mousewheel.js')}}"></script>
<script src="{{url('css/olympus/app/js/perfect-scrollbar.js')}}"></script>
<script src="{{url('css/olympus/app/js/jquery.matchHeight.js')}}"></script>
<script src="{{url('css/olympus/app/js/svgxuse.js')}}"></script>
<script src="{{url('css/olympus/app/js/imagesloaded.pkgd.js')}}"></script>
<script src="{{url('css/olympus/app/js/Headroom.js')}}"></script>
<script src="{{url('css/olympus/app/js/velocity.js')}}"></script>
<script src="{{url('css/olympus/app/js/ScrollMagic.js')}}"></script>
<script src="{{url('css/olympus/app/js/jquery.waypoints.js')}}"></script>
<script src="{{url('css/olympus/app/js/jquery.countTo.js')}}"></script>
<script src="{{url('css/olympus/app/js/popper.min.js')}}"></script>
<script src="{{url('css/olympus/app/js/material.min.js')}}"></script>
<script src="{{url('css/olympus/app/js/bootstrap-select.js')}}"></script>
<script src="{{url('css/olympus/app/js/smooth-scroll.js')}}"></script>
<script src="{{url('css/olympus/app/js/selectize.js')}}"></script>
<script src="{{url('css/olympus/app/js/swiper.jquery.js')}}"></script>
<script src="{{url('css/olympus/app/js/moment.js')}}"></script>
<script src="{{url('css/olympus/app/js/daterangepicker.js')}}"></script>
<script src="{{url('css/olympus/app/js/simplecalendar.js')}}"></script>
<script src="{{url('css/olympus/app/js/fullcalendar.js')}}"></script>
<script src="{{url('css/olympus/app/js/isotope.pkgd.js')}}"></script>
<script src="{{url('css/olympus/app/js/ajax-pagination.js')}}"></script>
<script src="{{url('css/olympus/app/js/Chart.js')}}"></script>
<script src="{{url('css/olympus/app/js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{url('css/olympus/app/js/circle-progress.js')}}"></script>
<script src="{{url('css/olympus/app/js/loader.js')}}"></script>
<script src="{{url('css/olympus/app/js/run-chart.js')}}"></script>
<script src="{{url('css/olympus/app/js/jquery.magnific-popup.js')}}"></script>
<script src="{{url('css/olympus/app/js/jquery.gifplayer.js')}}"></script>
<script src="{{url('css/olympus/app/js/mediaelement-and-player.js')}}"></script>
<script src="{{url('css/olympus/app/js/mediaelement-playlist-plugin.min.js')}}"></script>

<script src="{{url('css/olympus/app/js/base-init.js')}}"></script>
<script defer src="{{url('css/olympus/app/fonts/fontawesome-all.js')}}"></script>

<script src="{{url('css/olympus/app/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
  <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="//v2.zopim.com/?1hj6nSgRMmQTw1IIAZArYiuchzQzXvjj";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
<style>
    .landing-page .content-bg-wrap:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(118,168,43,.95);
    opacity: 1;
    z-index: auto;
}

.birthday-item.badges .skills-item-meter-active {
    background: linear-gradient(to right,#ff9432,#79a42e);
}

.btn-md-2 {
    padding: .8rem 2.1rem;
    font-size: 0.98rem;
}

.accordion-faqs .card-header {
    padding: 13px 0;
    border: none;
    border-top: 1px solid #e6ecf5;
}

.btn-primary {
    color: #fff;
    background-color: #4167b2;
    border-color: #4167b2;
}

.header--standard.header--standard-full-width, .header--standard.header--standard-landing {
    width: 100%;
    left: auto;
    top: 0;
    background-color: #4167b2;
}

.header-spacer--standard {
    height: 150px;
}

.page-description {
    border: 0px solid #e6ecf5;
    background-color: #fff;
    margin-bottom: 25px;
    border-radius: 5px;
    overflow: hidden;
}

.page-description .icon {
    padding: 15px 18px;
    fill: #fff;
    background-color: #4167b2;
    border-right: 1px solid #e6ecf5;
    display: inline-block;
    vertical-align: middle;
    margin-right: 25px;
}

.logo .logo-title {
    text-transform: none;
    margin: 0;
    color: inherit;
    transition: all .3s ease;
    font-weight: 600;
}

body {
    margin: 0;
    font-family: Roboto,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif;
    font-size: 1.2812rem;
    font-weight: 350;
    line-height: 1.1;
    color: #000;
    background-color: #edf2f6;
}

.birthday-item.badges .birthday-date {
    font-size: 15px;
}

.form-control {
    display: block;
    width: 100%;
    padding: 1.1rem;
    font-size: .812rem;
    line-height: 1.5;
    color: #fff;
    background-color: #fff;
    border: 1px solid #e6ecf5;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

label.control-label {
    color: #000;
}

.btn-secondary {
    color: #fff;
    background-color: #76A82B;
    border-color: #76A82B;
}

.main-header {
   padding: 110px 0 0px;
    max-width: calc(100%);
    margin: 0 auto 30px;
    position: relative;
    background-position: 50% 50%;
}

.header {
    height: 90px;
    background-color: #4167b2;
    padding-right: 0px;
    position: relative;
    top: 147px;
    left: 0;
    right: 0;
    z-index: 3;
}

.birthday-item.badges .skills-item {
    min-width: 184px;
    display: block;
    float: right;
    margin-bottom: 0;
    margin-top: 4px;
    margin-right:-50px;
}

.landing-content>:first-child {
    font-weight: 300;
    padding-top: 100px;
}

.header--standard-landing.headroom--not-top .logo, .header--standard-landing.headroom--not-top .logo .logo-title {
    color: #fff;
}

input, p, select {
     font-family: Roboto,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif;
    font-size: 1.012rem;
    font-weight: 350;
    line-height: 1.3;
    color: #888da8;
}

.accordion-faqs .collapse {
    margin-bottom: 0px;
}

.card-header a {
    color: #515365;
    display: block;
    font-size: 1.32rem;
    font-weight: 600;
}

.post__author {
    margin-bottom: 20px;
    font-size: 15px;
}

.landing-content>:first-child {
    font-weight: 300;
    padding-top: 76px;
    line-height: 29px;
}

.landing-content {
    color: #fff;
    margin-bottom: 30px;
    margin-top: -68px;
}

.page-description .icon {
    padding: 15px 18px;
    fill: #fff;
    background-color: #76A82B;
    border-right: 1px solid #e6ecf5;
    display: inline-block;
    vertical-align: middle;
    margin-right: 25px;
}

.bg-account {
    background-image: url(http://www.directodefinca.com/public/css/olympus/app/img/top-header7.png);
}

.main-header {
   padding: 110px 0 0px;
    max-width: calc(100%);
    margin: 0 auto 30px;
    position: relative;
    background-position: 50% 50%;
}


@media (max-width: 1200px)
.birthday-item {
     padding: 0px; 
}

@media (max-width: 1400px)
.birthday-item {
    padding: 0px 0px;
}

.skills-item .skills-item-meter {
    padding: 0;
    width: 71%;
    border-radius: 10px;
    background-color: #fff;
    position: relative;
    height: 6px;
}

.birthday-item.badges .skills-item {
    min-width: 140px;
    display: block;
    float: right;
    margin-bottom: 0;
    margin-top: 4px;
    margin-right: -3px;
}

.landing-page .content-bg-wrap:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: #4167b2;
    opacity: 0.95;
    z-index: auto;
}

.skills-item .skills-item-meter {
    padding: 0;
    width: 212%;
    border-radius: 7px;
    background-color: transparent;
    position: relative;
    height: 12px;
        margin-top: 12px;
}



</style>

</body>
</html>
