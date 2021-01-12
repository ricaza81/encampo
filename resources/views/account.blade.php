<!DOCTYPE html>
<html lang="en">
<head>

  <title>Agronielsen.com</title>

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
    <div class="row sorting-container responsive text-center"  data-layout="masonry" style="background: rgb(65, 103, 178);position: relative;height: 167.391px;padding-top:30px;padding-bottom: 20px;">
      <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12  sorting-item ecommerce natural text-center" style="left: 0%;top:0">
        <div class="header--standard-wrap text-center" >
          <a href="landing" class="logo" style="margin-right: 100px;">
            <div class="img-wrap text-center">
             <img src="{{asset('css/appx/assets/img/logoagronielsenencampo.png')}}" alt="Agronielsen en Campo">
            </div>
          </a>
        </div>
      </div>
      <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12  sorting-item worlds family politics responsive-display-none">
        <form class=""  action="login" method="post">
         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
          <div class="row">
           <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="form-group label-floating">
              <label class="control-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
           </div>
           <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="form-group label-floating">
             <label class="control-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
           </div>
           <div class="col col-lg-4 col-md-4 col-sm-12 col-12 text-left">
            <button type="submit" class="btn btn-secondary btn-md-2">Ingresar
             <div class="ripple-container"></div>
            </button>
           </div>
          </div>
        </form>
       </div>
    </div>
</div>
            <div class="container">
              <div class="row">
                
                      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <h2 class="presentation-margin">Por favor ingresa con tu cuenta:</h2>
                        <div class="registration-login-form">
                        <div class="tab-content">
                         <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                          <div class="login-box card">
                               <div class="card-body">
                                <h3 class="box-title m-t-40 m-b-0">Inicia sesión</h3>
                               </div>
                               <form id="login" action="login" method="post">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
                                 <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                  <div class="form-group label-floating is-empty">
                                    <label class="control-label">Email</label>
                                      <input class="form-control" placeholder="" type="email" name="email" required>
                                  </div>
                                  <div class="form-group label-floating is-empty">
                                    <label class="control-label">Contraseña</label>
                                      <input class="form-control" placeholder="" type="text" name="password">
                                  </div>
                                  <div class="remember">
                                    <div class="checkbox">
                                     <label style="color:#888da8">
                                      <input name="optionsCheckboxes" type="checkbox" style="color:#888da8">
                                      Recordarme
                                     </label>
                                    </div>
                                    <a href="password" class="forgot">Olvidé mi contraseña</a>
                                  </div>
                                  <button type="submit" class="btn btn-lg btn-primary full-width">Ingresar</button>
                                    <div class="or"></div>
                                      <label style="color:#888da8">Ó Ingresa con facebook</label>
                                                    <a href="redirect" class="btn btn-lg bg-facebook full-width btn-icon-left"><svg class="svg-inline--fa fa-facebook-f fa-w-9" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f" aria-hidden="true"></i> -->Ingresar con facebook
                                                    </a>
                                </div>
                              </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <h2 class="presentation-margin">Ó crea una nueva cuenta:</h2>
                        <div class="registration-login-form">
                        <div class="tab-content">
                         <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                          <div class="login-box card">
                               <div class="card-body">
                                <h3 class="box-title m-t-40 m-b-0">Registro</h3>
                               </div>
                          <form action="register" method="post">
                          <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
                                        <div style="color: #a94442; font-size:13px;border-color: #ebccd1;line-height:19px;border-radius: .25rem;">
                                            <?php if( isset($errors) ){ ?>
                                            <ul>                       
                                                  <?php foreach($errors->all() as $error){ ?>
                                                          <li style="color:#FA206A;" ><?= $error  ?></li>
                                                  <?php }  ?>
                                            </ul>
                                            <?php }  ?>
                                        </div>          
                                  <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group label-floating is-empty">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="name" >
                                    </div> 
                                  </div>
                                  <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group label-floating is-empty">
                                     <label class="control-label">Email (válido)</label>
                                     <input type="email" class="form-control" name="email" >
                                    </div>
                                  </div>
                                  <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group label-floating is-empty">
                                    <label class="control-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" >
                                    </div>
                                  </div>
                                  <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group label-floating is-empty">
                                    <label class="control-label">Confirmar Contraseña</label>
                                    <input type="text" class="form-control" name="cpassword" >
                                    </div>
                                  </div>
                                   <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">    
                                    <button type="submit" class="btn btn-lg btn-primary full-width">Registrarme</button>
                                   </div>
                                    <div class="or"></div>
                                     <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label style="color:#888da8">Ó Regístrate con facebook</label>
                                    <a href="redirect" class="btn btn-lg bg-facebook full-width btn-icon-left"><svg class="svg-inline--fa fa-facebook-f fa-w-9" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f" aria-hidden="true"></i> -->Registrarme con facebook
                                    </a>
                                  </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
</div>
</div>



</body>
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
    background-color: #fff;
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

.col-xl-12 {
    flex: 0 0 100%;
    max-width: 100%;
    margin-top: -16px;
}

</style>


</html>