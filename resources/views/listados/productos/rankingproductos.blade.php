<!DOCTYPE html>
<html lang="en">
<head>

  <title>Agronielsen en Campo: Gestor de visitas técnicas</title>

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

<div class="content-bg-wrap" style="background: #fff"></div>






    <div class="stunning-header-content" style="background: #fff;
    top: 6px;
    height: 100%;
    padding-top: 20px;
    padding-bottom: 10px;">
        <h1 class="stunning-header-title">Ranking de Productos</h1>
        <h2 class="stunning-header-title">Productos más recomendados</h2>
           <a  href="rankingasesores" class="btn btn-primary btn-lg" style="font-size:15px; background:#FF5E3A; border-color:#FF5E3A; color:#fff">Te Interesa la Asistencia Técnica?
                                            <div class="ripple-container">
                                            </div>
                                        </a>
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                 <span>Ir a: </span><a href="landing">Inicio</a>
                <span class="icon breadcrumbs-custom">/</span>
            </li>
            <li class="breadcrumbs-item active">
                <span></span>
            </li>
        </ul>
    </div>
<!--
    <div class="header--standard animated headroom--top headroom--not-bottom text-center responsive" style="background:url(http://www.directodefinca.com/public/imagenes/food.jpg)">

  <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12  sorting-item ecommerce natural text-center" style="left: 0%;top:0">

                            <div class="header--standard-wrap text-center" style="position:absolute">



<li class="shoping-cart more" >
                    

                                <a href="#" class="nav-link">
                                <svg class="olymp-shopping-bag-icon" style="fill: #fff;"><use xlink:href="{{url('/css/olympus/app/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
                            
                            </a>
                    <div class="more-dropdown shop-popup-cart text-center" style="width: 242px;right: -150px;padding: 0;">
                                
                                <ul style="padding-top:8px">
                                    <li class="cart-product-item">Ingresa como:</li>
                                
                          
                            <a  href="login" class="btn btn-primary btn-lg" style="padding: 13px;
    color: #fff;">Ingresar como agricutor</a>
                            <a  href="restaurantes" class="btn btn-primary btn-lg" style="padding: 10px;
    color: #fff;">Ingresar como restaurante</a>
                            <a  href="login" class="btn btn-primary btn-lg" style="padding: 12px;
    color: #fff;">Ingresar como comprador</a>

                                </ul></div></li></div></div>
    
                                        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12  sorting-item worlds family politics responsive-display-none" style="position: absolute;left: 50%;color: rgb(0, 0, 0);margin-top:25px">
                                                        <label class="control-label" style="color:#fff">Síguenos</label>
                                                        <br/>
                                                        <div class="more responsive" style="padding-top:8px">
                                                            <a href="https://www.facebook.com/agronielsen" target="_blank">
                                                            <img class="responsive" src="{{asset('imagenes/logo-fb.png')}}" alt="DF" class="logo-colored">
                                                            </a>
                                                            <a href="https://www.linkedin.com/company/agronielsen" target="_blank">
                                                            <img class="responsive" src="{{asset('imagenes/logo-lk.png')}}" alt="DF" class="logo-colored">
                                                            </a>    
                                                        </div>
                                                   </div>
                                    
                    
                    <img class="responsive" src="http://www.directodefinca.com/public/imagenes/vegetables.png" alt="rocket">
                    <a target="_blank" href="restaurantes" class="btn btn-primary btn-lg" style="margin-bottom:0px;margin-left: 15px;">Nuevo Servicio para Restaurantes</a>

    </div>-->

<section class="pt120" style="background:#fff;padding-top:13px">
    <div class="container">
        <div class="row">
          <?php
              foreach($products as $product) { ?>
              <?php   if (($product->cantrecomendaciones($product->id))>=5){ ?>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

                
                <!-- Product Item -->
     
            <div class="shop-product-item">
                    <div class="product-thumb">
                       <a href="{{ route('producto', [$product->slug]) }}">
                        <img src="<?=$product->imgenpdt?>" alt="{{ $product->producto }}">
                       </a>
                    </div>
                    <div class="product-content">
                        <div class="block-title">
                            <a href="{{ route('producto', [$product->slug]) }}" class="product-category">{{ $product->producto }}</a>
                            <a href="{{ route('producto', [$product->slug]) }}" class="h5 title">{{ $product->producto }}</a>
                        </div>
                        <div class="block-price">
                        
                           <!-- <div class="">${{ $product->precio}}</div>
                            <div class="">Cant.Recom.<?= $product->cantrecomendaciones($product->id);?></div>-->
                         
                                <div class="birthday-item inline-items badges">
                               <div class="skills-item" style="background:#fff">
                                         <div class="birthday-date responsive" style="font-size:12px">Ranking: <?=number_format($product->cantrecomendaciones($product->id)/$recomendacionestotales*100,1)?>%
                                         </div>
                                         <div class="skills-item-meter responsive">
                                            <span class="skills-item-meter-active skills-animate" style="width: <?=$product->cantrecomendaciones($product->id)/$recomendacionestotales*100?>%; opacity: 1;"></span>
                                         </div>
                                   </div>
                                   </div>
                               


                        </div>
                    </div>
                   <div class="more text-right">
                                              <div class="comments-shared">
                                                   <svg class="olymp-share-icon" data-toggle="tooltip" data-placement="right" data-original-title="Contacto Directo"><use xlink:href="http://localhost/directo/public/css/olympus/app/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg> <a href="{{ route('producto', [$product->slug]) }}" class="btn btn-md-2 btn-primary" style="font-size:15px;">+INFO<div class="ripple-container"></div></a>
                                             </div>
                                            </div>
                                <!--
                                        <form method="post" action="" class="">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="product_id" value="{{ $product->id}}">
                                              <input type="hidden" name="product_name" value="{{ $product->name}}">
                                              <input type="hidden" name="product_price" value="{{ $product->price}}">
                                               
                                            <div class="more text-right">
                                              <div class="comments-shared">
                                                   <svg class="olymp-share-icon" data-toggle="tooltip" data-placement="right" data-original-title="Contacto Directo"><use xlink:href="http://localhost/directo/public/css/olympus/app/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg> <button type="submit" class="btn btn-md-2 btn-primary" style="font-size:15px;">Comprar<div class="ripple-container"></div></button>
                                             </div>
                                            </div>
                                        </form> -->
            

 
            </div>

           </div> 
                  <?php } ?>
                   <?php } ?>
      
               
        </div>
    </div>




</section>



    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
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

.btn-md-2 {
    padding: .8rem 2.1rem;
    font-size: 0.98rem;
}

.btn-primary {
    color: #fff;
    background-color: #76A82B;
    border-color: #76A82B;
}

.btn-lg:hover {
    color: #fff;
    background-color: #76A82B;
    border-color: #76A82B;
}

.header--standard.header--standard-full-width, .header--standard.header--standard-landing {
    width: 100%;
    left: 0;
    top: 0;
    background-color: #4167b2;
        position: relative;
}

.header--standard {
    background-color: #fff;
    width: 100%;
    position: relative;
    left: 0px;
   padding: 0;
    box-shadow: 0 0 34px 0 rgba(63,66,87,.1);
    z-index: 19;
    margin-bottom: -5px;
    height:100%;
    padding-bottom:20px;

}

.header-spacer--standard {
    height: 140px;
        position: relative;
}

.page-description {
    border: 0px solid #e6ecf5;
    background-color: #fff;
  /*  margin-bottom: 25px;*/
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
    font-family: Roboto;
    font-size: 1.1812rem;
    font-weight: 350;
    line-height: 1.1;
    color: #888da8;
    background-color: #edf2f6;
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
    margin-left: 15px;
}

.main-header {
   padding: 110px 0 0px;
    max-width: calc(100%);
    margin: 0 auto 30px;
    position: relative;
    background-position: 50% 50%;
}

.header {
    height: 81px;
    background-color: #4167b2;
    padding-right: 0px;
    position: relative;
    top: 103px;
    left: 0;
    right: 0;
    z-index: 3;
    padding-top: 42px;
        position: absolute;
    width: 65%;
    margin-left: 93px;
}

.header--standard-landing.headroom--not-top .logo, .header--standard-landing.headroom--not-top .logo .logo-title {
    color: #fff;
}

.header--standard-wrap {
    /* display: -webkit-box; */
    display: -ms-flexbox;
    /* display: flex; */
    /* -webkit-box-align: center; */
    -ms-flex-align: center;
    align-items: center;
    /* position: absolute; */
   /* width: 65%;*/
    margin-left: 93px;
}

input, p, select {
    font-size: 1.775rem;
    line-height: 26px;
    color: #000;
}

.post__author {
    margin-bottom: 20px;
    font-size: 15px;
}

.landing-content>:first-child {
    font-weight: 300;
    padding-top: 22px;
    line-height: 29px;
}

.landing-content {
    color: #fff;
    margin-bottom: 30px;
    margin-top: 48px;
}

.cat-list-bg-style {
    margin-top: 50px;
    height: 107px;
    padding: 0;
    list-style: none;
}


.logo .logo-title {
    text-transform: none;
    margin-left: 0px;
    color: inherit;
    transition: all .3s ease;
    font-weight: 600; }

.logo .img-wrap {
    position: relative;
    padding-left: 0px;
    padding-right:12px;
}

.teammembers-thumb img {
    transition: all 1s ease-out;
     -webkit-filter: grayscale(0%); 
     filter: grayscale(0%); 
    display: block;
    margin: 0 auto;
}



.teammembers-thumb img {
    width: 100%;
    object-fit: cover;
    height: 297px;
}

.post-video {
    /* border: 1px solid #e6ecf5; */
    /* border-radius: 3px; */
    /* overflow: hidden; */
    margin-left: -26px;
    margin-right: -26px;
        margin-bottom: -76px;
    margin-top: -17px;
     border: 0px solid #e6ecf5;
}

.post-additional-info {
    padding: 86px 0 0;
    border-top: 1px solid #e6ecf5;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;

}

.ui-block {

    border: 0px solid #e6ecf5;
}

.shop-product-item .product-thumb {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    background-color: #f2f4f8;
    margin-bottom: 11px;
    margin-right: 0;
    height: 320px;
    width: auto;
    position: relative;
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

.birthday-item.badges .skills-item-meter-active {
    background: linear-gradient(to right,#ff9432,#79a42e);
}

</style>


</html>
