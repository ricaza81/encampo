<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema | Panel Control</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
   <!-- <link rel="stylesheet" href="plugins/morris/morris.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

    <!-- Daterange picker 
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css">-->
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

      
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
       
    <link rel="stylesheet" href="css/sistemalaravel.css">

   
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="/crm" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>VLF</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="imagenes/crm-horizontal.png" width="146" height="71"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:20px;height:20px;">
                  <span class="hidden-xs"><?=  $usuario->nombres;  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
                      <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:50px;height:50px;">
                    <p>
                     VLF User
                      <small>Member since Jun. 2016</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>


      </header>
      <!-- Left side column. contains the logo and sidebar -->
      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
              <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:50px;height:50px;">
            </div>
            <div class="pull-left info">
              <p>User: <?=  $usuario->nombres;  ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa  fa-users"></i> <span>CREW</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                

                <?php
                 if ($usuario->tipoUsuario==1) { ?>
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(1);" ><i class="fa fa-circle-o"></i>Add Crew member </a></li>
                <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(1,1);" ><i class="fa fa-circle-o"></i>Crew List</a></li>
                <?php } ?>
                <?php
                 if ($usuario->tipoUsuario==2) { ?>
                 <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(5);" ><i class="fa fa-circle-o"></i>Mi perfil</a></li>
                <?php } ?>
               <!-- <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(2,1);" ><i class="fa fa-circle-o"></i>Publicaciones</a></li> -->

              </ul>
            </li>  


              <!--<li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-envelope"></i> <span>CORREO</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(3);" ><i class="fa fa-circle-o"></i>Enviar Correo</a></li>
                
              </ul>
            </li>  


            <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-database"></i> <span>DATOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(2);" ><i class="fa fa-circle-o"></i>Cargar Datos Us. </a></li>
                
              </ul>
            </li>-->  

            

                        <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-database"></i> <span>LEADS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
             
              <?php
                 if ($usuario->tipoUsuario==1) { ?>
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(4);" ><i class="fa fa-circle-o"></i> Add Lead </a></li>
                <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(7,1);" ><i class="fa fa-circle-o"></i>Leads</a></li>
                <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(3,1);" ><i class="fa fa-circle-o"></i>Export DB</a></li>
               <?php }?>
               <?php
                 if ($usuario->tipoUsuario==2) { ?>
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(4);" ><i class="fa fa-circle-o"></i> Agregar Prospecto </a></li>
                <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(6,1);" ><i class="fa fa-circle-o"></i>Mis Prospectos</a></li>
               <?php }?> 

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-calendar"></i> <span>AGENDA</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
             
              <?php
                 if ($usuario->tipoUsuario==1) { ?>
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(5);" ><i class="fa fa-circle-o"></i> My Agenda</a></li>
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(6);" ><i class="fa fa-circle-o"></i> Crew Agenda</a></li>
             <!--   <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(7,1);" ><i class="fa fa-circle-o"></i>Leads</a></li> -->
               <?php }?>
               <?php
                 if ($usuario->tipoUsuario==2) { ?>
               <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(5);" ><i class="fa fa-circle-o"></i> Ver programación </a></li>
              <!--  <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(6,1);" ><i class="fa fa-circle-o"></i>My Leads</a></li> -->
               <?php }?> 

              </ul>
            </li>  

            <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-dashboard"></i> <span>INSIGHTS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
           <!--     <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(3,1);" ><i class="fa fa-circle-o"></i> Reportes </a></li> -->
                 <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(4,1);" ><i class="fa fa-circle-o"></i> Lead Insights </a></li>
                
              </ul>
            </li>
 


          
          </ul>




        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header"> 
          <h1>
            
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

         <!-- contenido capas modales -->

          <?php 
           if($usuario->tipoUsuario==1){ include('menus/submenu_admin.php'); }
          // if($usuario->tipoUsuario==1){ include('menus/submenu_admin_prospecto.php'); }   
           if($usuario->tipoUsuario!=1){ include('menus/submenu_standard.php'); }    ?>  

       

        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">
        
        </section>
    
      <!-- cargador empresa -->
        <div style="display: none;" id="cargador_empresa" align="center">
            <br>
         

         <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

         <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
       </div>

  



      </div><!-- /.content-wrapper -->
     


     
    </div><!-- ./wrapper -->


    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script>  $("#content-wrapper").css("2000px","2000px"); </script>
   
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <!--   <script src="plugins/morris/morris.min.js"></script> -->
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>



    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--    <script src="dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
 
 <!-- javascript del sistema laravel -->
   <script src="js/sistemalaravel.js"></script>
    <script src="js/highcharts.js"></script>
  <script src="js/graficas.js"></script>

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"> </script>
  <script src="https://code.jquery.com/jquery-1.12.3.js"> </script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

   
       

 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84415411-1', 'auto');
  ga('send', 'pageview');

</script>  

<?php
    if ($usuario->tipoUsuario==1) { ?>
   <script>cargarlistado(7);</script>
<?php } ?>

<?php
    if ($usuario->tipoUsuario==2) { ?>
   <script>cargarlistado(5);</script>
<?php } ?>



  </body>
</html>
