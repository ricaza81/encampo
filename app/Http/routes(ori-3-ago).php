<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//rutas para el WEB SERVICE
//=====================================================
Route::get('paises_landing','LandingController@paisesJson');
Route::get('departamentos_landing/{id}', 'LandingController@departamentosJson');
Route::get('datos_departamento_landing/{id}', 
        'LandingController@dataDepartamentoJson'); 
Route::get('cultivos_landing','LandingController@cultivosJson');    
 
Route::post('add_lead','LandingController@store');
//=====================================================

//rutas accessibles slo si el usuario no se ha logueado
Route::group(['middleware' => 'guest'], function () {
  Route::get('landing', 'Auth\AuthController@landing');
  Route::get('respuesta-landing', 'Auth\AuthController@respuesta_landing');
  //LANDINGS
  //Cosmo-R
  Route::get('landing_cosmo_r', 'Auth\AuthController@landing_cosmo_r');
  Route::get('respuesta-landing_cosmo_r',
              'Auth\AuthController@respuesta_landing_cosmo_r');
  //Cosmo-IN d
  Route::get('landing_cosmo_in_d', 'Auth\AuthController@landing_cosmo_in_d');
  Route::post('agregar_lead_landing_cosmo_in_d', 
          ['as' =>'agregar_lead_landing_cosmo_in_d', 
          'uses' => 'Auth\AuthController@agregar_lead_landing_cosmo_in_d']);
  Route::get('respuesta-landing_cosmo_in_d', 
            'Auth\AuthController@respuesta_landing_cosmo_in_d');
  //Corporativa
  Route::get('landing_cosmoagro', 'Auth\AuthController@landing_cosmoagro');
  Route::get('landing_cosmoagro_2017', 'Auth\AuthController@landing_cosmoagro');
  Route::get('respuesta-landing_cosmoagro', 
            'Auth\AuthController@respuesta_landing_cosmoagro');
  //RUTAS CORPORATIVA LA GUERRA DE LOS CLONES
  Route::get('landing_cosmoagro_2017_cultural1', 
    'Auth\AuthController@landing_cosmoagro_2017_cultural1');
  Route::get('landing_cosmoagro_2017_cultural2', 'Auth\AuthController@landing_cosmoagro_2017_cultural2');
  Route::get('landing_cosmoagro_2017_cultural3', 'Auth\AuthController@landing_cosmoagro_2017_cultural3');
  Route::get('landing_cosmoagro_2017_laboratorioyasistencia', 'Auth\AuthController@landing_cosmoagro_2017_laboratorioyasistencia');
  Route::get('landing_cosmoagro_2017_testimoniales', 'Auth\AuthController@landing_cosmoagro_2017_testimoniales');
  Route::get('landing_cosmoagro_2017_cosmoquel', 'Auth\AuthController@landing_cosmoagro_2017_cosmoquel');
  Route::get('landing_cosmoagro_2017_ciplex', 'Auth\AuthController@landing_cosmoagro_2017_ciplex');
  Route::get('landing_cosmoagro_2017_cosmofoliar', 'Auth\AuthController@landing_cosmoagro_2017_cosmofoliar');
  Route::get('landing_cosmoagro_2017_cosmoquelbalance', 'Auth\AuthController@landing_cosmoagro_2017_cosmoquelbalance');
  Route::get('landing_cosmoagro_2017_triadamin', 'Auth\AuthController@landing_cosmoagro_2017_triadamin');
  Route::get('landing_cosmoagro_2017_11', 'Auth\AuthController@landing_cosmoagro_2017_11');
  Route::get('landing_cosmoagro_2017_12', 'Auth\AuthController@landing_cosmoagro_2017_12');
  Route::get('landing_cosmoagro_2017_13', 'Auth\AuthController@landing_cosmoagro_2017_13');
  Route::get('landing_cosmoagro_2017_14', 'Auth\AuthController@landing_cosmoagro_2017_14');
  Route::get('landing_cosmoagro_2017_15', 'Auth\AuthController@landing_cosmoagro_2017_15');
  Route::get('landing_cosmoagro_2017_16', 'Auth\AuthController@landing_cosmoagro_2017_16');
  Route::get('landing_cosmoagro_2017_17', 'Auth\AuthController@landing_cosmoagro_2017_17');
  Route::get('landing_cosmoagro_2017_18', 'Auth\AuthController@landing_cosmoagro_2017_18');
  Route::get('landing_cosmoagro_2017_19', 'Auth\AuthController@landing_cosmoagro_2017_19');
  Route::get('landing_cosmoagro_2017_20', 'Auth\AuthController@landing_cosmoagro_2017_20');
  Route::get('landing_cosmoagro_2017_21', 'Auth\AuthController@landing_cosmoagro_2017_21');
  Route::get('landing_cosmoagro_2017_22', 'Auth\AuthController@landing_cosmoagro_2017_22');
  Route::get('landing_cosmoagro_2017_23', 'Auth\AuthController@landing_cosmoagro_2017_23');
  Route::get('landing_cosmoagro_2017_24', 'Auth\AuthController@landing_cosmoagro_2017_24');
  Route::get('landing_cosmoagro_2017_25', 'Auth\AuthController@landing_cosmoagro_2017_25');
  Route::get('landing_cosmoagro_2017_26', 'Auth\AuthController@landing_cosmoagro_2017_26');
  Route::get('landing_cosmoagro_2017_27', 'Auth\AuthController@landing_cosmoagro_2017_27');
  Route::get('landing_cosmoagro_2017_28', 'Auth\AuthController@landing_cosmoagro_2017_28');
  Route::get('landing_cosmoagro_2017_29', 'Auth\AuthController@landing_cosmoagro_2017_29');
  Route::get('landing_cosmoagro_2017_30', 'Auth\AuthController@landing_cosmoagro_2017_30');
  Route::get('landing_cosmoagro_2017_31', 'Auth\AuthController@landing_cosmoagro_2017_31');
  Route::get('landing_cosmoagro_test', 'Auth\AuthController@landing_cosmoagro_2017_test');
  //FIN RUTAS CORPORATIVAS LA GUERRA DE LOS CLONES
    

// Route::post('agregar_lead_landing', 'Auth\AuthController@@agregar_lead_landing');
 // Route::get('departamentos', ['as' =>'departamentos/{id}', 'uses' => 'Auth\AuthController@departamentos']);
  Route::post('agregar_lead_landing', ['as' =>'agregar_lead_landing', 'uses' => 'Auth\AuthController@agregar_lead_landing']);
  Route::post('agregar_lead_landing_cosmo_r', ['as' =>'agregar_lead_landing_cosmo_r', 'uses' => 'Auth\AuthController@agregar_lead_landing_cosmo_r']);
//    Route::post('agregar_lead_landing', 'UsuariosController@@agregar_lead_landing');

	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
// Registration routes...
	Route::get('register', 'Auth\AuthController@getRegister');
	Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
//Forgot Password
Route::get('password', 'Auth\PasswordController@getEmail');


Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

});

//rutas accessibles solo si el usuario esta autenticado y ha ingresado al sistema
Route::group(['middleware' => 'auth'], function () {

	//Route::get('paises_landing','LandingController@paisesJson');
  

  Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::get('listado_usuarios', 'UsuariosController@listado_usuarios');

    Route::get('listado_comercial', 'UsuariosController@listado_comercial');

    Route::get('listado_prospectos_comercial', 
              'UsuariosController@listado_prospectos_comercial');
    Route::get('listado_todos_prospectos_comercial', 'AgricultorController@listado_todos_prospectos_comercial');
    Route::get('listado_reporte', 'ReporteController@listado_reporte');
    // Route::get('listado_todos_prospectos_comercial', 'UsuariosController@buscar_prospecto');
     Route::get('dato_buscado', 'UsuariosController@dato_buscado');
      Route::post('buscarprospecto();', 'UsuariosController@listado_todos_prospectos_comercial');

//Vista-Listado Jefes de Zona
     Route::get('listado_prospectos_zona', 'UsuariosController@listado_prospectos_zona');
    
//Seleccionar Zona automaticamente se selecciona departamento al agregar un nuevo prospecto
Route::get('/datos_departamento/{id}', 'UsuariosController@datos_departamento');
Route::get('/departamentos/{id}', 'UsuariosController@departamentos');
Route::get('/pais_departamentos/{id}', 'UsuariosController@pais_departamentos');   

Route::get('/email_jz/{id}', 'UsuariosController@email_jz');   



	Route::get('listado_publicaciones/{id?}', 'PublicacionesController@listado_publicaciones');
	Route::get('descargar_publicacion/{id}', 'PublicacionesController@descargar_publicacion');
	Route::get('buscar_usuarios/{pais}/{dato?}', 'UsuariosController@buscar_usuarios');
  Route::get('buscar_prospecto/{dato?}', 'UsuariosController@buscar_prospecto');
  Route::get('buscar_prospecto', 'UsuariosController@buscar_prospecto');

	  //leccion 13
    Route::get('form_enviar_correo', 'CorreoController@crear');
    Route::post('enviar_correo', 'CorreoController@enviar');
    Route::post('cargar_archivo_correo', 'CorreoController@store');

    Route::get('reportes', 'PdfController@index');
  //   Route::get('crear_reporte_porpais/{tipo}', 'PdfController@crear_reporte_porpais');
  Route::get('crear_reporte_prospectos/{tipo}', 'ExcelController@crear_reporte_porpais');
    Route::get('listado_graficas', 'GraficasController@index');
    Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
    Route::get('grafica_publicaciones', 'GraficasController@total_publicaciones');
Route::get('form_nuevo_prospecto', 'UsuariosController@form_nuevo_prospecto');


Route::get('form_calendario', 'UsuariosController@form_calendario');
Route::get('/events_prospectos/{id}', 'UsuariosController@events_prospectos');
Route::get('/events_prospectos_admin/{id}', 'UsuariosController@events_prospectos_admin');
Route::post('agregar_nuevo_evento_prospecto', 'UsuariosController@agregar_nuevo_evento_prospecto');
Route::post('agregar_nuevo_evento_prospecto_admin', 'UsuariosController@agregar_nuevo_evento_prospecto_admin');
 Route::get('listado_mis_eventos', 'UsuariosController@listado_mis_eventos');

 Route::get('calendario_usuario_respuesta', 'EventosController@calendario_usuario_respuesta');
//Route::get('fullCalModal', 'UsuariosController@vista_evento');

Route::get('form_calendario_admin', 'UsuariosController@prospectos_asesor');
Route::get('form_calendario_admin', 'UsuariosController@form_calendario_admin');


Route::get('/prospectos/{id}', 'UsuariosController@prospectos_asesor');
//Route::get('/prospectos/{id}', 'UsuariosController@getprospectos');


      //leccion 11
      Route::get('form_publicaciones_usuario/{id}', 'PublicacionesController@form_publicaciones_usuario');
      Route::post('agregar_publicacion_usuario', 'PublicacionesController@agregar_publicacion');
      Route::get('borrar_publicacion/{id}', 'PublicacionesController@borrar_publicacion');
      Route::get('borrar_observacion/{id}', 'VisitasController@borrar_observacion');
      Route::get('borrar_prospecto/{id}', 'UsuariosController@borrar_prospecto');
      Route::post('borrar_evento/{id}', 'UsuariosController@borrar_evento');
      Route::get('borrar_event_list/{id}', 'UsuariosController@borrar_evento_list');
      Route::get('form_eventos_prospecto/{id}', 'EventosController@prospecto_eventos');

      Route::get('form_editar_evento/{id}', 'EventosController@form_editar_eventos');
      Route::post('editar_evento', 'UsuariosController@editar_evento');

Route::get('form_observaciones_prospecto/{id}', 'VisitasController@form_observaciones_usuario');
Route::post('agregar_observacion_prospecto', 'VisitasController@agregar_observacion_prospecto');

Route::get('info_datos_usuario/{id}', 'UsuariosController@info_datos_usuario');
  //  Route::get('/geo-marketing', ['uses' => 'HomeController@listMap']);

    Route::post('/all-prospects', ['uses' => 'ProspectosController@all']);

Route::controller('notifications', 'NotificationController');




});



    


//rutas accessibles solo para el usuario administrador

Route::group(['middleware' => 'usuarioAdmin'], function () {
      
      Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
      Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');
     Route::get('form_editar_prospecto/{id}', 'UsuariosController@form_editar_prospecto');

//Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
Route::post('editar_usuario', 'UsuariosController@editar_usuario');

      Route::get('info_datos_usuario/{id}', 'UsuariosController@info_datos_usuario');

Route::post('editar_prospecto', 'UsuariosController@editar_prospecto');

      Route::post('subir_imagen_usuario', 'UsuariosController@subir_imagen_usuario');
      Route::post('cambiar_password', 'UsuariosController@cambiar_password');
      //leccion 9
      Route::get('form_cargar_datos_usuarios', 'UsuariosController@form_cargar_datos_usuarios');
      Route::post('cargar_datos_usuarios', 'UsuariosController@cargar_datos_usuarios');
      //leccion 10
      Route::get('form_educacion_usuario/{id}', 'EducacionController@form_educacion_usuario');
      Route::post('agregar_educacion_usuario', 'EducacionController@agregar_educacion');
      Route::get('borrar_educacion/{id}', 'EducacionController@borrar_educacion');



      //leccion 11 repetida
	  Route::get('form_proyectos_usuario/{id}', 'ProyectosController@form_proyectos_usuario');
	  Route::post('agregar_proyectos_usuario', 'ProyectosController@agregar_proyectos_usuario');
	  Route::get('borrar_proyecto/{id}', 'ProyectosController@borrar_proyecto');


//ASIGNACIÓN RTC
    Route::get('form_asignar_rtc/{id}', 'RTCController@form_asignar_rtc');
    Route::post('asignar_prospecto', 'RTCController@asignar_prospecto');



/*Agricultores*/
/*Crear nuevo agricultor*/
Route::post('agregar_nuevo_agricultor', 'AgricultorController@agregar_nuevo_agricultor');
/*Nueva Finca Agricultor*/
Route::get('form_nueva_finca_agricultor/{id}', 'AgricultorController@form_nueva_finca_agricultor');
/*Agregar Nueva Finca Agricultor*/
Route::post('agregar_nueva_finca_agricultor', 'AgricultorController@agregar_nueva_finca_agricultor');
/*id_ciudad Agricultor*/
Route::get('/id_ciudad_agri/{id}', 'AgricultorController@id_ciudad_agri');
/*listado_fincas_agricultores*/
Route::get('listado_fincas_agricultores', 'AgricultorController@listado_fincas_agricultores');
/*Nueva Visita Tecnica Finca*/
    /*ruta_fincas_agricultor*/
     Route::get('/id_fincas_agri/{id}', 'AgricultorController@id_fincas_agri');
    /*formulario nueva visita tecnica*/
    Route::get('form_nueva_visita_finca_agricultor/{id}','AgricultorController@form_nueva_visita_finca_agricultor');
    /*formulario editar visita tecnica*/
        Route::get('form_editar_visita_finca_agricultor/{id}','AgricultorController@form_editar_visita_finca_agricultor');
    Route::post('agregar_nuevo_producto_visitatecnica_agricultor', 'AgricultorController@agregar_nuevo_producto_visitatecnica_agricultor');
       Route::post('agregar_nuevo_producto_visitatecnica_agricultor_ajax/{id}', 'AgricultorController@agregar_nuevo_producto_visitatecnica_agricultor_ajax');


    /*agregar nueva visita tecnica*/
        Route::get('agregar_nueva_visitatecnica_agricultor/{id}', 'AgricultorController@agregar_nueva_visitatecnica_agricultor');
    Route::post('/agregar_nueva_visitatecnica_agricultor', 'AgricultorController@agregar_nueva_visitatecnica_agricultor');

});

Route::group(['middleware' => 'usuarioStandard'], function () {	
     
    Route::get('info_datos_usuario/{id}', 'UsuariosController@info_datos_usuario');
   Route::get('form_nuevo_prospecto', 'UsuariosController@form_nuevo_prospecto');
Route::post('agregar_nuevo_prospecto', 'UsuariosController@agregar_nuevo_prospecto');
Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
Route::post('editar_usuario', 'UsuariosController@editar_usuario');
Route::get('form_editar_prospecto/{id}', 'UsuariosController@form_editar_prospecto');
Route::post('editar_prospecto', 'UsuariosController@editar_prospecto');
 

});