<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agronielsen En Campo | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120906226-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-120906226-1');
    </script>
      <link rel="apple-touch-icon" sizes="180x180" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/agronielsen-apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/faviconnielsen.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/faviconnielsen-16-16.png">
    <meta name="description" content="La primera plataforma de visitas técnicas que centraliza y automatiza completamente tu gestión">
    <meta name="keywords" content="Agronielsen, Agro nielsen, agronielsen en campo, visitas, agrícola, integración, automatización">
    <link rel="author" href="https://www.agronielsen.com/encampo" />
    <link rel="canonical" href="https://www.agronielsen.com/encampo"/>
    <!-- FB Meta tags -->
    <meta property="og:title" content="Agronielsen en Campo: Gestor de visitas técnicas"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://res.cloudinary.com/cegalvarez/image/upload/v1505242035/landingBgmin_jfooxu.png"/>
    <meta property="og:url" content="https://www.agronielsen.com/encampo"/>
    <meta property="og:description" content="La primera plataforma de gestión de proyectos que centraliza y automatiza completamente G Suite"/>
    <!-- Bootstrap 3.3.5 -->
   
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/plugins/iCheck/square/blue.css">

   

     <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">

      <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css">
           <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/appx/dependencies/font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/pe-icon-7-stroke.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

   <body class="mini-sidebar">
 
<section id="wrapper" class="login-register" style="background-image: url(https://www.agronielsen.com/encampo/public/imagenes/field-min.jpg)">

        <div class="login-box card">

            <div class="card-body">



      <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
              <div class="social" style="margin-top:-28px">

        <a  class="text-center db" href="landing"><img src="https://www.agronielsen.com/encampo/public/css/appx/assets/img/agronielsen.png" alt="Home"></a> 



          <form action="register" method="post" class="form-horizontal form-material">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
       
            <h3 class="box-title text-center" style="padding: 5px 0 5px 0;background: #00A859;/*margin-bottom: 28px;*/color:#fff;border-radius: .25rem;font-size:13px">Empieza la centralización!</h3>
              
              <div style="color: #a94442; font-size:13px;border-color: #ebccd1;line-height:19px;border-radius: .25rem;">
                  <?php if( isset($errors) ){ ?>
                  <ul>
                       
                        <?php foreach($errors->all() as $error){ ?>
                                <li style="color:#FA206A;" ><?= $error  ?></li>
                        <?php }  ?>

                  </ul>

                  <?php }  ?> </div> 
                    </div></div></div>
          
          <div class="row">
          <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          </div>

             <div class="col-md-6">
           <div class="form-group has-feedback">
             <label>Email (válido)</label>
            <input type="email" class="form-control" name="email" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
          </div>
        
        <div class="row">
          <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Contraseña</label>
            <input type="password" class="form-control" name="password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Confirmar</label>
            <input type="password" class="form-control" name="cpassword" placeholder="Contraseña" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          </div>
          </div>
         
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
              <div class="social">
                
                  <button type="submit" class="btn btn-primary">Registrarme</button>
                  <a href="landing" class="btn btn-primary">Volver</a>
               
             </div>
             </div>
           </div>
          
         
          
          <style>
              .or {
    position: relative;
    width: 100%;
    height: 1px;
    margin: 1rem 0 2rem;
    background-color: #e6ecf5;
    color:#000;
}
          </style>
          
           <div class="row">
                <div class="or"></div>
                             <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                 <label>Ó Registrate con Facebook</label>
                                <div class="social">
              <a href="redirect" class="btn btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                </div>
                            </div>
            </div>
        </form>
      </div>
    </div>
    </div>

      </section>

      </body>
</html>

    <!-- jQuery 2.1.4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://www.agronielsen.com/encampo/public/plugins/iCheck/icheck.min.js"></script> 
   



    <style>
.login-box{
    background-color: #fff;
    opacity: 0.9;
}
.login-box:hover{
    background-color: #fff;
    opacity: 1;
}


.card-body {
    padding: 1.8rem; 
background:#fff;
margin-top:-115px;}


<style>
.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: -15px;
    margin-bottom: 3px;
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
.form-material .form-group {
    /* overflow: hidden; */
}

.form-group {
    /* margin-bottom: 25px; */
}
</style>



<style>
   body {
    margin: 0;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 0.7;
    color: #000;
    text-align: left;
    background-color: #fff;
}
</style>

    

