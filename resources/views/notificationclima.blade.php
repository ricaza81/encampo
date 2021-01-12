<!DOCTYPE html>
<html>
    <head>
        <title>Agronielsen en Campo: Gestor de visitas técnicas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="La primera plataforma de visitas tecnicas que centraliza y automatiza completamente tu gestión" />
        <meta
            name="keywords"
            content="Agronielsen, Agro nielsen, agronielsen en campo, visitas, agrícola, integración, automatización,mercado agrícola,visitas técnicas,gestor de visitas técnicas, fertilizantes foliares, fertilizantes, foliares,abonos"
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
        <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}" />
        <link rel="stylesheet" href="{{asset('/css/sistemalaravel.css')}}" />

        <!-- <link rel="stylesheet" href="http://www.aplicatics.co/empresas/public/dist/css/AdminLTE.min.css"> -->

        <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}" />

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

        <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css" />
    </head>
    <body id="body">
        <div class="container">
            <div class="row" style="margin-top: 108px;">
                <div class="col col-xl-3 order-xl-2 col-lg-3 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                    <div class="site-logo" style="margin-top: -67px;">
                        <a href="landing" class="main-logo"><img src="https://www.agronielsen.com/encampo/public/css/appx/assets/img/agronielsen.png" alt="Agronielsen en Campo" /></a>
                    </div>
                </div>
                <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12" style="margin-top: 0px;">
                    <div class="" style="margin-top: 0px; line-height: 16px; padding: 20px; background: #d4edda; border: 2px solid #155724; border-radius: 7px;">
                        <h2 class="presentation-margin text-left" style="letter-spacing: -1px; margin: -12px 0 10px;">Informe procesado:</h2>

                        <div class="ui-block">
                            <div class="ui-block-content text-center">
                                URL:
                                <a href="<?=$url?>" class="btn btn-purple btn-lg full-width" target="_blank">Ver reporte </a>

                                <input type="hidden" name="latitud" value="<?= $latitud; ?>" />
                                <input type="hidden" name="longitud" value="<?= $longitud; ?>" />
                                <input type="hidden" id="url" name="url" value="<?= $url; ?>" />
                            </div>
                        </div>

                        <div class="" style="margin-top: 0px; line-height: 16px; padding: 20px; background: #d4edda; border: 2px solid #155724; border-radius: 7px;">
                            <h2 class="presentation-margin text-left" style="letter-spacing: -1px; margin: -12px 0 10px;">Reporte enviado a:</h2>
                            <span style="font-size: 18px; line-height: 11px; color: #155724; margin-bottom: 10px;"> </span>
                            <div id="notificacion_resul_fci" class="hidden"><?=$msj?></div>
                        </div>
                    </div>

                    <div class="ui-block">
                        <a href="consultaclima" class="btn btn-purple btn-lg full-width" target="_self">Nueva consulta </a>
                    </div>

                    <div class="col col-xl-3 order-xl-2 col-lg-3 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12" style="margin-top: 72px; padding-top: 40px;">
                        <div class="site-logo" style="margin-top: 0px;">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- AgronielsenQueryWeather -->
                            <ins class="adsbygoogle" style="display: block;" data-ad-client="ca-pub-6899098620713335" data-ad-slot="8177505825" data-ad-format="auto" data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

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
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=c5c1215c-ecf8-44af-b71c-210ea7a83f5a"></script>
    <!-- End of  Zendesk Widget script -->

    <!--<script>

$(document).ready(function() {
  $("#button_report").click(function() {
    $("email_report").hide();
  });

});

</script>

<script>
          function show(){
          document.getElementById("notificacion_resul_fci").className = "aprobado";
          $("#notificacion_resul_fci").show();
          $("#email_report").hide();
          $("#button_report").hide();
          document.getElementById("button_report").style.display = "none";
          }
</script>-->

    <style>
        .aprobado {
            background-color: #e9fcfa;
            border: 1px dashed #006600;
            padding: 8px;
            margin-bottom: 10px;
        }

        html body .p-t-0 {
            padding-top: 0px;
            background: #fff3cd;
            padding: 9px;
            width: 100%;
            color: #856404;
            border: 1px solid transparent;
            border-radius: 0.45rem;
        }
    </style>
</html>
