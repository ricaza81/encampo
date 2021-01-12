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
           <a  href="{{asset('rankingasesores')}}" class="btn btn-primary btn-lg" style="font-size:15px; background:#FF5E3A; border-color:#FF5E3A; color:#fff">Te Interesa la Asistencia Técnica?
                                            <div class="ripple-container">
                                            </div>
                                        </a>
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                 <span>Ir a: </span><a href="{{asset('rankingproductos')}}">Productos</a>
                <span class="icon breadcrumbs-custom">/</span>
            </li>
            <li class="breadcrumbs-item active">
                <span></span>
            </li>
        </ul>
    </div>



<section class="pt120" style="background:#fff;padding-top:13px">

	
	<!-- Shop Product Detail -->
	
	<div class="shop-product-detail">
		<div class="container">
			<div class="row">
				<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="thumbs-wrap">
						<div class="small-thumbs-wrap js-zoom-gallery">
							<a href="https://www.agronielsen.com/encampo/storage/<?=$producto->imgenpdt?>" class="small-thumb">
								<img src="https://www.agronielsen.com/encampo/storage/<?=$producto->imgenpdt?>" alt="product">
							</a>
							<a href="https://www.agronielsen.com/encampo/storage/<?=$producto->imgenpdt?>" class="small-thumb">
								<img src="https://www.agronielsen.com/encampo/storage/<?=$producto->imgenpdt?>" alt="product">
							</a>
						</div>
	
						<div class="shop-product-detail-thumb">
							<img class="main-img" alt="product" src="https://www.agronielsen.com/encampo/storage/<?=$producto->imgenpdt?>">
						</div>
					</div>
				</div>
				<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="shop-product-detail-content">
						<div class="main-content-wrap">
							<div class="block-title">
								<a href="#" class="product-category">{{$producto->empresa->nombreempresa}}</a>
								<h2 class="title bold">{{$producto->producto}}</h2>
								<ul class="rait-stars">
									<li>
										<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
									</li>
	
									<li>
										<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
									</li>
									<li>
										<i class="far fa-star star-icon" aria-hidden="true"></i>
									</li>
								</ul>
							</div>
	
							<div class="block-price">
							   <div class="birthday-item inline-items badges">
                               <div class="skills-item" style="background:#fff">
                                         <div class="birthday-date responsive" style="font-size:12px">Ranking: <?=number_format($producto->cantrecomendaciones($producto->id)/$recomendacionestotales*100,1)?>%
                                         </div>
                                         <div class="skills-item-meter responsive">
                                            <span class="skills-item-meter-active skills-animate" style="width: <?=$producto->cantrecomendaciones($producto->id)/$recomendacionestotales*100?>%; opacity: 1;"></span>
                                         </div>
                                   </div>
                                   </div>
							</div>
						</div>
	
						<p>{{$producto->descripcion}}
						</p>
	
					<!--	<div class="inputs-wrap">
	
							<div class="form-group label-floating quantity">
								<label class="control-label">Quantity</label>
								<a href="#" class="quantity-minus">&#8744;</a>
								<input title="Qty" class="form-control" value="2" type="text">
								<a href="#" class="quantity-plus">&#8743;</a>
							</div>
	
							<div class="form-group label-floating is-select">
								<label class="control-label">Select Size</label>
								<select class="selectpicker form-control">
									<option value="SM">Small Mug (2,5’’ High)</option>
									<option value="BI">Big Mug (3,5’’ High)</option>
								</select>
							</div>
	
						</div>-->
	
						<a href="#" class="btn btn-blue btn-md with--icon">
							<svg class="olymp-shopping-bag-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-shopping-bag-icon"></use></svg>
							<div class="text">
								<span class="title">Contactar a: {{$producto->empresa->nombreempresa}} </span>
							</div>
						</a>
	                <!--
						<ul class="tags">
							<li>
								Tags:
							</li>
							<li>
								<a class="tags-item" href="#">Enamel,</a>
							</li>
							<li>
								<a class="tags-item" href="#">Coffee,</a>
							</li>
							<li>
								<a class="tags-item" href="#">Mugs,</a>
							</li>
							<li>
								<a class="tags-item" href="#">White</a>
							</li>
						</ul>
	
						<div class="article-number">
							SKU:<span>ASF55GX</span>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ... end Shop Product Detail -->

</section>




<!-- JS Scripts -->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/perfect-scrollbar.js"></script>
<script src="js/jquery.matchHeight.js"></script>
<script src="js/svgxuse.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/velocity.js"></script>
<script src="js/ScrollMagic.js"></script>
<script src="js/jquery.waypoints.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/smooth-scroll.js"></script>
<script src="js/selectize.js"></script>
<script src="js/swiper.jquery.js"></script>
<script src="js/moment.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/simplecalendar.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/ajax-pagination.js"></script>
<script src="js/Chart.js"></script>
<script src="js/chartjs-plugin-deferred.js"></script>
<script src="js/circle-progress.js"></script>
<script src="js/loader.js"></script>
<script src="js/run-chart.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/jquery.gifplayer.js"></script>
<script src="js/mediaelement-and-player.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

<script src="js/base-init.js"></script>
<script defer src="fonts/fontawesome-all.js"></script>

<script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>

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

</style>

</body>
</html>