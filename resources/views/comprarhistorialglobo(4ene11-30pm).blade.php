<!DOCTYPE html>
<html>
<head>

    <title>Agronielsen en Campo: Estación meteorológica virtual</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="La primera plataforma de visitas tecnicas que centraliza y automatiza completamente tu gestión" />
    <meta
        name="keywords"
        content="clima, variables meteorologicas,meteorologicas, variables, latitud, longitud, coordenadas, Agronielsen, Agro nielsen, agronielsen en campo, visitas, agrícola, integración, automatización,mercado agrícola,visitas técnicas,gestor de visitas técnicas, fertilizantes foliares, fertilizantes, foliares,abonos"
    />
    <meta property="og:title" content="Agronielsen en Campo: Gestor de visitas técnicas" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://www.agronielsen.com/encampo/public/css/appx/media/banner/posicion-gif.gif" />

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120906226-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-120906226-1");
    </script>

      <script type="text/javascript" src="{{asset('js/globe/third-party/Detector.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/globe/third-party/three.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/globe/third-party/Tween.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/globe/third-party/globe.js')}}"></script>

    <link rel="author" href="https://www.agronielsen.com/encampo" />
    <link rel="canonical" href="https://www.agronielsen.com/encampo" />

    <!-- FB Meta tags -->

    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/css/fonts.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('css/pe-icon-7-stroke.css')}}" />

    <link rel="stylesheet" href="{{asset('css/appx/dependencies/components-elegant-icons/css/elegant-icons.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/swiper/css/swiper.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/simple-line-icons/css/simple-line-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/wow/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/slick-carousel/css/slick.css')}}" type="text/css}}" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/magnific-popup/css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">
    <!--<link rel="stylesheet" href="{{asset('/css/sistemalaravel.css')}}">-->

   <!-- <link rel="stylesheet" href="http://www.aplicatics.co/empresas/public/dist/css/AdminLTE.min.css"> -->

    <!--<link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">-->

    <link rel="icon" type="image/png" sizes="32x32" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/faviconnielsen.png" />

    <!--<link rel="manifest" href="/site.webmanifest">-->
    <link rel="mask-icon" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/safari-pinned-tab.svg" color="#454be5" />

    <!-- Dependency Styles -->

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/appx/assets/css/app.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/Bootstrap/dist/css/bootstrap-reboot.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/Bootstrap/dist/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/Bootstrap/dist/css/bootstrap-grid.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/css/main.min.css')}}" />

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700%7CPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/css/ionicons.min.css">-->

    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css">
</head>

<body style="background:#f3f3fc/*#48484A*/">

      <div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12" style="margin-right: -16px;">
        <div class="site-logo" style="padding-top: 45px;margin-right: -16px;padding-bottom: 20px">
                            <a href="landing" class="main-logo"><img src="https://www.agronielsen.com/encampo/public/css/appx/assets/img/agronielsen.png" alt="Agronielsen en Campo" />
                            </a>
        </div>
     </div>

    <div class="container">
    <div class="row">
        <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                 <div class="ui-block-content">
              
                    <div class="ui-block-title inline-items">
                        <h1 class="title">Comprar nuevo historial personalizado</h1><h5 style="float:right;">variables meteorológicas<br>(límite: 5 años históricos)</h5>
                     
                    </div>

                    
      <div id="container" style="height: 223px;">
                        <div id="info">
    <strong>
        <a href="http://www.chromeexperiments.com/globe">WebGL Globe</a></strong> <span class="bull">&bull;</span> Created by the Google Data Arts Team <span class="bull">&bull;</span> Data acquired from <a href="http://sedac.ciesin.columbia.edu/gpw/">SEDAC</a>
  </div>

  <div id="currentInfo">
    <span id="year1990" class="year">1990</span>
    <span id="year1995" class="year">1995</span>
    <span id="year2000" class="year">2000</span>
  </div>

  <div id="title">
    World Population
  </div>

  <a id="ce" href="http://www.chromeexperiments.com/globe" style="height: 400px">
    <span>This is a Chrome Experiment</span>
  </a></div>
       
                </div>
            </div>
        </div>
        
                 <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                   
                    <div class="ui-block">
                 <div class="ui-block-content">
              
                    <div class="ui-block-title inline-items">

                     

  
                   

   
                  </div>
                     <div class="ui-block-title inline-items">
                   
                             <a style="font-size:25px;margin-top:0px;background: #76A82B;margin-top: 0px;" class="btn btn-purple btn-lg" href="https://agronielsen.com/encampo/public/descargables/ConsultaFincaRisaraldaSept2020.pdf" target="_blank">Esto obtienes
                                                    </a>
   
                  </div>
</div>
</div>
</div>
    



<div class="container">
    <div class="row">
            <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="ui-block">
                        <div class="ui-block-content">

                         <div class="ui-block-title inline-items">
                            <div class="btn btn-control btn-control-small bg-green" style="margin-left: -35px;">
                                <svg class="olymp-trophy-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                            </div>
                         <h3 class="title">Selecciona la ubicación</h3>
                            
                        </div>

                          <p class="responsive" style="font-size:16px;letter-spacing:0px;line-height:18px;color:#000;"><br>
                      Ingresando las variables de Latitud y Longitud de una ubicación, obtendrás los datos climatologicos como <b style="color:#1565C0;font-weight: 600"><a href="https://agronielsen.com/encampo/public/descargables/ConsultaFincaRisaraldaSept2020.pdf" target="_blank" style="color:#1565C0;font-weight: 600">Temperatura, Precipitación, Humedad relativa, Presión atmosferica, Velocidad del viento, UV index (luminosidad)</a></b>. 
                      <br><br>Puedes marcar la casilla "consultar mi ubicación" o arrastrar el marcador para una nueva ubicación. <br> <span><a href="https://agronielsen.com/encampo/public/descargables/ConsultaFincaRisaraldaSept2020.pdf" target="_blank">(Ver informe de ejemplo)</a></span>

              </p>
           
                      <form action="{{ url('/newclima') }}" method="post" id="">  
                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                            
                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color:#fff">Latitud</label>
                                            <input class="form-control" style="font-size: 20px;color:#fff;border:1px solid #fff;background: #1565C0;" type="text" placeholder="" id="txtLat" name="latitud" required/>
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                         <label class="control-label" style="color:#fff">Longitud</label>
                                              <input class="form-control" style="font-size: 20px;color:#fff;border:1px solid #fff;background: #1565C0;" type="text" placeholder="" id="txtLng" name="longitud" required/>
                                    </div>
                                </div>
                                   
                                    <input class="form-control" style="font-size:8px" type="hidden" placeholder="" id="url" name="url"/>

                                     <div class="col col-lg-6 col-md-6 col-sm-12 col-12" style="padding-bottom: 12px">
                                               <input id="checkbox-signup" class="form-control" type="checkbox" name="remember"/>
                                                <label for="checkbox-signup" style="margin-left: 20px;border-bottom: 2px solid #000;height: 35px;"> Consultar mi ubicación actual
                                                </label>
                                    </div>
                                     <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                         <label style="height: 35px;float:right;color:#000"> Total $120.000 (COP)
                                                </label>
                                                <a style="font-size:25px;margin-top:0px;width:272px;padding-left:27px;background: #76A82B;float:right;" class="btn btn-purple btn-lg" href="https://checkout.wompi.co/l/72SHUi" target="_blank">Comprar
                                                </a>

                                            </div>
        </div>
    </form>
</div>
</div>
</div>



                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                     <div class="ui-block">
                     <div class="ui-block-content">
                  
                      
                                <a class="h6 post__author-name fn" href="02-ProfilePage.html">Arrastra el marcador</a>
                                <div id="map_canvas" class="map_canvas" style="height: 650px;width: 100%;">
                                </div>
                            </div>
                       
                  
                </div>
            </div>
        </div>
    </div>
</div>

 <!--========================-->
    <!--=        Footer        =-->
    <!--========================-->
    <footer id="site-footer-two" class="site-footer">
        <div class="container">
            <div class="footer-inner-two wow fadeInUp">
                <div class="row">
                    <div class="col-lg-4 col-md-7">
                        <div class="widget widget-about">
                            <div class="footer-logo">
                                <img src="https://www.agronielsen.com/encampo/public/css/appx/assets/img/sticky-logo.png" alt="Agronielsen en Campo" />
                            </div>

                            <p class="content">
                                Ofrecemos soluciones empresariales que se integran a la estrategia de transformación digital, para una mayor productividad del sector agrícola en latinoamérica.
                            </p>
                        </div>
                        <!-- /.widget widget-about -->
                    </div>
                    <!-- /.col-lg-2 -->

                    <div class="col-lg-2 col-md-5">
                        <div class="widget widget-menu">
                            <h3 class="widget-title">Soporte</h3>

                            <ul class="footer-menu">
                                <li><a href="https://play.google.com/store/apps/details?id=io.ionic.agronielsen" target="_blank">Google Play</a></li>
                                <!--<li><a href="https://www.agronielsen.com/politica-privacidad/" target="_blank">Privacidad</a></li>-->
                                <!-- <li><a href="https://www.agronielsen.com/modelamiento-de-datos/" target="_blank">Modelo de datos</a></li>-->
                                <li><a href="register">Registrarme</a></li>
                                <li><a href="login">Cuenta</a></li>
                                <li><a href="password">Olvidé mi contraseña</a></li>
                            </ul>
                        </div>
                        <!-- /.widget widget-menu -->
                    </div>
                    <!-- /.col-lg-2 -->

                    <div class="col-lg-3 col-md-7">
                        <div class="widget widget-menu">
                            <h3 class="widget-title">Compañía</h3>

                            <ul class="footer-menu">
                                <li><a href="https://www.agronielsen.com/" target="_blank">Agronielsen</a></li>
                                <li><a href="{{asset('visor')}}" target="_blank">Analítica de datos</a></li>
                                <li><a href="{{asset('ventainformes')}}" target="_blank">Venta de Informes</a></li>
                                <!-- <li><a href="https://www.agronielsen.com/membresia-inteligencia-de-mercados-agricolas-colombia/?restricted=page" target="_blank">Membresía Inteligencia de Mercados</a></li>-->
                                <!-- <li><a href="https://www.agronielsen.com/blog/abre-tu-cuenta-gratis/" target="_blank">Demo de tablero de Análisis</a></li>-->
                                <!-- <li><a href="https://www.agronielsen.com/mineria" target="_blank">Míneria de Clientes</a></li>-->
                                <li><a href="https://directodefinca.com" target="_blank">Directo de Finca</a></li>
                                <li><a href="https://www.agronielsen.com/blog/contacto/" target="_blank">Contacto</a></li>
                                <li><a href="register" target="_blank">Suscribirse</a></li>
                            </ul>
                        </div>
                        <!-- /.widget widget-menu -->
                    </div>
                    <!-- /.col-lg-2 -->

                    <div class="col-lg-3 col-md-5">
                        <div class="widget widget-menu">
                            <h3 class="widget-title">Contacto</h3>

                            <ul class="footer-contact-info">
                                <!--<li><span>Oficina:</span> Calle 32A #2B-63, CALI</li>-->
                                <li><span>Contáctanos:</span><a href="tel:+573004339418"> +573004339418</a></li>
                                <li><span></span> info@agronielsen.com</li>
                            </ul>

                            <div class="follow-us">
                                <span>{{trans('messages.follower')}}</span>

                                <ul class="footer-social-two">
                                    <li>
                                        <a href="https://www.facebook.com/agronielsen" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/agronielsen" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/agronielsen" target="_blank"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>-->

                                    <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>-->
                                </ul>
                            </div>
                            <!-- /.follow-us -->
                        </div>
                        <!-- /.widget widget-menu -->
                    </div>
                    <!-- /.col-lg-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.footer-inner -->

            <div class="site-info">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="copyright wow fadeInUp" data-wow-delay="0.3s">Todos los derechos reservados © 2020 Desarrollado por <a href="https://www.mktmedia.co" target="_blank">MKT Media | Transformación Digital 4.0</a></p>
                    </div>
                    <!-- /.col-lg-6 -->

                    <!--   <div class="col-lg-6">
              <ul class="footer-menu-bottom wow fadeInUp" data-wow-delay="0.3s">
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
              </ul>-->
                    <!-- /.footer-menu -->
                    <!-- </div>-->
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.site-info -->
        </div>
        <!-- /.container -->

        <div class="footer-animate-bubble"></div>
    </footer>

<script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/popper.js/popper.min.js"></script>
<script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/swiper/js/swiper.jquery.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/swiperRunner/js/swiperRunner.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/assets/js/TweenMax.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/wavify/jquery.wavify.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/jquery.parallax-scroll/jquery.parallax-scroll.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/countUp.js/countUp.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/jquery.appear/jquery.appear.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/wow/js/wow.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/raindrops/js/raindrops.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/slick-carousel/js/slick.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/parallax/js/jquery.parallax.min.js"></script>
   <!-- <script src="{{asset('css/olympus/app/js/material.min.js')}}"></script>-->
    <!--<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>-->
    <!--<script src="https://www.agronielsen.com/encampo/public/css/appx/assets/js/SmoothScroll.min.js"></script>-->

    <!-- Site Scripts -->
    <script src="https://www.agronielsen.com/encampo/public/css/appx/assets/js/app.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/plugins/fastclick/fastclick.js"></script>

    <!-- Start of  Zendesk Widget script -->
<!--<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=c5c1215c-ecf8-44af-b71c-210ea7a83f5a"> </script>-->

 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQHajz50AMsSbRB52JWyYMAuVGavU8YJ0&callback=initMap" async defer></script>

 <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=c5c1215c-ecf8-44af-b71c-210ea7a83f5a"> </script>

   <script type="text/javascript">

    if(!Detector.webgl){
      Detector.addGetWebGLMessage();
    } else {

      var years = ['1990','1995','2000'];
      var container = document.getElementById('container');
      var globe = new DAT.Globe(container);

      console.log(globe);
      var i, tweens = [];
      
      var settime = function(globe, t) {
        return function() {
          new TWEEN.Tween(globe).to({time: t/years.length},500).easing(TWEEN.Easing.Cubic.EaseOut).start();
          var y = document.getElementById('year'+years[t]);
          if (y.getAttribute('class') === 'year active') {
            return;
          }
          var yy = document.getElementsByClassName('year');
          for(i=0; i<yy.length; i++) {
            yy[i].setAttribute('class','year');
          }
          y.setAttribute('class', 'year active');
        };
      };
      
      for(var i = 0; i<years.length; i++) {
        var y = document.getElementById('year'+years[i]);
        y.addEventListener('mouseover', settime(globe,i), false);
      }
      
      var xhr;
      TWEEN.start();
      
      
      xhr = new XMLHttpRequest();
      xhr.open('GET', 'https://www.agronielsen.com/encampo/public/js/globe/population909500.json', true);
      xhr.onreadystatechange = function(e) {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            window.data = data;
            for (i=0;i<data.length;i++) {
              globe.addData(data[i][1], {format: 'magnitude', name: data[i][0], animated: true});
            }
            globe.createPoints();
            settime(globe,0)();
            globe.animate();
            document.body.style.backgroundImage = 'none'; // remove loading
          }
        }
      };
      xhr.send(null);
    }

  </script>

    <script type="text/javascript">
      
      var checkbox = document.querySelector("input[name=remember]");
    checkbox.addEventListener( 'change', function() {
    if(this.checked) {
          navigator.geolocation.getCurrentPosition(
                function (position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude,
                    };
                    document.getElementById("txtLat").value = parseFloat(position.coords.latitude).toFixed(4);
                    document.getElementById("txtLng").value = parseFloat(position.coords.longitude).toFixed(4);
                    document.getElementById("txtLat").style.background="#7c5ac2";
                    document.getElementById("txtLng").style.background="#7c5ac2";
                                        var coords = coords;
                      var lat = document.getElementById("txtLat").value;
                      var lon = document.getElementById("txtLng").value;
                      var params1 = {
                            "ds1.lat": lat,
                            "ds1.lon": lon,
                            "ds8.lat": lat,
                            "ds8.lon": lon,
                            "ds6.lat": lat,
                            "ds6.lon": lon,
                            "ds9.lat": lat,
                            "ds9.lon": lon,
                            "ds116.lat": lat,
                            "ds116.lon": lon,
                            "ds117.lat": lat,
                            "ds117.lon": lon,
                            "ds118.lat": lat,
                            "ds118.lon": lon,
                            "ds119.lat": lat,
                            "ds119.lon": lon,
                            "ds121.lat": lat,
                            "ds121.lon": lon,
                            "ds114.lat": lat,
                            "ds114.lon": lon
                                    };
    var params1AsString = JSON.stringify(params1);
    var encodedParams1 = encodeURIComponent(params1AsString);
    var urlencode=(JSON.stringify(encodedParams1));
    //console.log(JSON.stringify(encodedParams1));
    console.log(lat);
    console.log(lon);
    var URL="https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=" + urlencode.replace(/\"/g, "")
                    document.getElementById("url").value=URL;
                    document.getElementById("query_1").style.background="#23d975";
                    })
           google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

           var map = new google.maps.Map(document.getElementById("map_canvas"), {
                // zoom: 13,
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(coords.lat, coords.lng),
            });

            var infowindow = new google.maps.InfoWindow({});
             marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Aquí estoy!",
                icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });
             infowindow.setContent(
                  
                  "latitud " + coords.lat + "<br>" + "longitud " + coords.lng //+"<br>" + "altitud " + coords.lng
                     
                );
                
            });





    } else {
        //document.getElementById("query").reset();
        //document.getElementById("query_1").style.background="#7c5ac2";

      //  document.getElementById("map_canvas").reset();

 google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));
                document.getElementById("txtLat").style.background="#000000";
                document.getElementById("txtLng").style.background="#000000";

              });

  marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Arrastra este marcador",
                //icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });

       /*navigator.geolocation.getCurrentPosition(
                function (position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude,
                    };
                    document.getElementById("txtLat").value = parseFloat(position.coords.latitude).toFixed(4);
                    document.getElementById("txtLng").value = parseFloat(position.coords.longitude).toFixed(4);
                    })
           google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

           var map = new google.maps.Map(document.getElementById("map_canvas"), {
                // zoom: 13,
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(coords.lat, coords.lng),
            });

            var infowindow = new google.maps.InfoWindow({});
             marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Aquí estoy!",
                icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });
             infowindow.setContent(
                  
                  "latitud " + coords.lat + "<br>" + "longitud " + coords.lng //+"<br>" + "altitud " + coords.lng
                     
                );
                //console.log(coords);

                //map.panTo(evt.latLng);*/
          //  });
         //}
       }
//})
});

    </script>


   <script>
       var marker; //variable del marcador
       var map;
        var coords = {};
         var data = {};//coordenadas obtenidas con la geolocalización
        //var map, infowindow;
        //Funcion principal
         function initMap () {
            //usamos la API para geolocalizar el usuario
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude,
                    };
                    setMapa(coords);

                      google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));
                                document.getElementById("txtLat").style.background="#000000";
                document.getElementById("txtLng").style.background="#000000";
                //console.log(coords);

                //map.panTo(evt.latLng);
            });
                    });


          }

          function setMapa(coords) {
            //Se crea una nueva instancia del objeto mapa
            var map = new google.maps.Map(document.getElementById("map_canvas"), {
                // zoom: 13,
                zoom: 3.8,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(coords.lat, coords.lng),
            });

            var infowindow = new google.maps.InfoWindow({});

                      

            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            // var markerLabel = 'YO!';
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Aquí estoy!",
                icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });
             infowindow.setContent(
                  
                  "latitud " + coords.lat + "<br>" + "longitud " + coords.lng //+"<br>" + "altitud " + coords.lng
                     
                );
      infowindow.open(map,marker);

           
        }
    </script>

<script>
    var latitud;
    var longitud;
    //var status = null;

function ref(){

    var lat = document.getElementById("txtLat").value;
    var lon = document.getElementById("txtLng").value;
    if(
      document.getElementById("txtLat").value != "" &&
      document.getElementById("txtLng").value != ""
      //&& document.getElementById("email").value != ""
       ) {
  
    var params1 = {
                            "ds1.lat": lat,
                            "ds1.lon": lon,
                            "ds8.lat": lat,
                            "ds8.lon": lon,
                            "ds6.lat": lat,
                            "ds6.lon": lon,
                            "ds9.lat": lat,
                            "ds9.lon": lon,
                            "ds116.lat": lat,
                            "ds116.lon": lon,
                            "ds117.lat": lat,
                            "ds117.lon": lon,
                            "ds118.lat": lat,
                            "ds118.lon": lon,
                            "ds119.lat": lat,
                            "ds119.lon": lon,
                            "ds121.lat": lat,
                            "ds121.lon": lon,
                            "ds114.lat": lat,
                            "ds114.lon": lon
                                    };
    var params1AsString = JSON.stringify(params1);
    var encodedParams1 = encodeURIComponent(params1AsString);
    var urlencode=(JSON.stringify(encodedParams1));
    //console.log(JSON.stringify(encodedParams1));
    console.log(lat);
    console.log(lon);
  var URL="https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=" + urlencode.replace(/\"/g, "")
  //document.getElementById("enlace3").setAttribute('href',URL);

  console.log(URL);
  document.getElementById("url").value=URL; 
//  window.open(URL)
//  window.location(URL); 
}
}
</script>

<style>
  /*body {
    background: #fff;
    font-family: "Poppins", sans-serif;
    margin: 0;
    overflow-x: hidden;
    color: #99abb4;
    font-weight: 300;
    /*margin-right: -120px;
}*/

.map_canvas
{
  position: initial;
  overflow: visible;
}

.full-width {
   /* width: 132%;*/
}

.col-6 {
    flex: 0 0 50%;
    max-width: 65%;
    padding-right: 92px;
}

  html {
        height: 100%;
      }
      body {
        margin: 0;
        padding: 0;
        background: #000000 url(./loading.gif) center center no-repeat;
        color: #ffffff;
        font-family: sans-serif;
        font-size: 13px;
        line-height: 20px;
        height: 100%;
      }

      #info {

        font-size: 11px;
        position: absolute;
        bottom: 5px;
        /*background-color: rgba(0,0,0,0.8);*/
        background-color:transparent;
        border-radius: 3px;
        right: 10px;
        padding: 10px;

      }

      #currentInfo {
        width: 270px;
        position: absolute;
        left: 20px;
        top: 63px;

        /*background-color: rgba(0,0,0,0.2);*/
        background-color:transparent;

        border-top: 1px solid rgba(255,255,255,0.4);
        padding: 10px;
      }

      a {
        /*color: #aaa;*/
        color: transparent;
        text-decoration: none;
      }
      a:hover {
        text-decoration: underline;
      }

      .bull {
        padding: 0 5px;
        color: #555;
      }

      #title {
        position: absolute;
        top: 20px;
        width: 270px;
        left: 20px;
        /*background-color: rgba(0,0,0,0.2);*/
        background-color:transparent;
        border-radius: 3px;
        font: 20px Georgia;
        padding: 10px;
      }

      .year {
        font: 16px Georgia;
        line-height: 26px;
        height: 30px;
        text-align: center;
        float: left;
        width: 90px;
        color: rgba(255, 255, 255, 0.4);

        cursor: pointer;
        -webkit-transition: all 0.1s ease-out;
      }

      .year:hover, .year.active {
        font-size: 23px;
        color: #fff;
      }

      #ce span {
        display: none;
      }

      #ce {
        width: 107px;
        height: 55px;
        display: block;
        position: absolute;
        bottom: 15px;
        left: 20px;
        background: url(./ce.png);
      }

 

</style>

</body>
</html>