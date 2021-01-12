                <section class="content-header"> 
          <h1>
            
            <small>Panel de Control</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Dashboard</li>
          </ol>
        

          <?php 
                     
           if($usuario->tipoUsuario==1) { ?>

      <!--     if($usuario->tipoUsuario==1){ include('/home/adminaplicatics/public_html/empresas/resources/views/menus/submenu_admin.php'); }
      //     if($usuario->tipoUsuario==1){ include('/home/adminaplicatics/public_html/empresas/resources/views/menus/submenu_admin_evento.php'); }   
      //     if($usuario->tipoUsuario!=1){ include('/home/adminaplicatics/public_html/empresas/resources/views/menus/submenu_standard.php'); }
      //     if($usuario->tipoUsuario!=1){ include('/home/adminaplicatics/public_html/empresas/resources/views/menus/submenu_standard_evento.php'); }      
       -->
         
                     <div id="capa_modal" class="div_modal" ></div>
                     <div id="capa_para_edicion" class="div_contenido" >
                     
                      <input type="hidden" id="usuario_seleccionado" value="0"  />
                      <input type="hidden" id="seccion_seleccionada" value="0"  />

                      <div class="margin"  id="botones_control" >
                                  <!--<button type="button" class="btn btn-primary" onclick="mostrarseccion(1);" >Informacion</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(2);" >Educación</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(3);" >Carga Documentos</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(5);" >Seguimiento</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(4);" >Proyectos</button> --> 
                                 
                      </div>
                    

                      <div  id="contenido_capa_edicion" ></div>


     

                 <?php }?>
         </section>
       