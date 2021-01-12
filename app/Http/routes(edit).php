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

//rutas accessibles slo si el usuario no se ha logueado
Route::group(['middleware' => 'guest'], function () {

	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
// Registration routes...
	Route::get('register', 'Auth\AuthController@getRegister');
	Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);


});

//rutas accessibles solo si el usuario esta autenticado y ha ingresado al sistema
Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::get('listado_usuarios/{page?}', 'UsuariosController@listado_usuarios');

    Route::get('listado_comercial', 'UsuariosController@listado_comercial');

    Route::get('listado_prospectos_comercial', 'UsuariosController@listado_prospectos_comercial');
    Route::get('listado_todos_prospectos_comercial', 'UsuariosController@listado_todos_prospectos_comercial');
   Route::get('listado_todos_prospectos_comercial', 'UsuariosController@buscar_prospecto');

	Route::get('listado_publicaciones/{id?}', 'PublicacionesController@listado_publicaciones');
	Route::get('descargar_publicacion/{id}', 'PublicacionesController@descargar_publicacion');
	Route::get('buscar_usuarios/{pais}/{dato?}', 'UsuariosController@buscar_usuarios');
  Route::post('buscar_prospecto/{dato?}', 'UsuariosController@buscar_prospecto');
  Route::post('buscarprospecto();', 'UsuariosController@buscar_prospecto');
   Route::get('buscar_prospecto/{dato?}', 'UsuariosController@listado_todos_prospectos_comercial');
     Route::get('buscar_todos_prospectos', 'UsuariosController@buscar_todos_prospectos');
     Route::get('buscar_prospecto', 'UsuariosController@listado_todos_prospectos_comercial');
 

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


Route::get('form_observaciones_prospecto/{id}', 'VisitasController@form_observaciones_usuario');
Route::post('agregar_observacion_prospecto', 'VisitasController@agregar_observacion_prospecto');

Route::get('info_datos_usuario/{id}', 'UsuariosController@info_datos_usuario');



Route::get('form_editar_prospecto/{id}', 'UsuariosController@showDate');


});



    


//rutas accessibles solo para el usuario administrador

Route::group(['middleware' => 'usuarioAdmin'], function () {
      
      Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
      Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');
     Route::get('form_editar_prospecto/{id}', 'UsuariosController@form_editar_prospecto');

Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
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