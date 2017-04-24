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

Route::get('/', function () {
    return view('welcome');// generadopor php artisan
});

Route::auth();// generado por php artisan

Route::get('/home', 'HomeController@index');

//Route::get('/', ['middleware'=> 'auth', 'uses' =>'InicioController@index']);

Route::group(['middleware' => ['auth']],function(){

	route::resource('institucion','Institucion\InstitucionControlador');
	route::resource('transaccion','Institucion\TransaccionControlador');
	
    ///generado manualmente los que sigue:
    Route::get('/ingreso', function () {
        return view('auth.ingreso');
    });
    Route::get('/menuprincipal', function () {
        return view('Menu.menuprincipal');
    });
    //---------BITACORAS------------------------
    Route::get('bitacora','Administracion\BitacoraControlador@generar_bitacora');

    //-------------PERSONAS-------------------------
        
    route::resource('persona','Personas\PersonaControlador');
    Route::get('frmpersona','Persona\PersonaControlador@FormPersona');
    
    Route::get('/frmbusquedapersona/{codigo_transaccion}', 'Persona\PersonaControlador@FormBusquedaPersona');
    Route::get('/datospersona/{id_persona}','Persona\PersonaControlador@ObtenerDatoPersona');

    Route::get('/imagenpersona/{id_persona}','Persona\PersonaControlador@DesplegarImagenPersona');
    //Route::get('/imagenpersona/{id_persona}','Persona\PersonaControlador@showPicture');
    //esta ruta utiliza Ajacx de Jquery
    Route::post('buscarpersonas','Persona\PersonaControlador@BuscarPersonas');
    Route::get('/persona', 'Persona\PersonaControlador@BuscarPersona');
    Route::post('/persona', 'Persona\PersonaControlador@RegistrarPersona');
    Route::delete('/persona/{persona}', 'Persona\PersonaControlador@dar_baja');
    

    route::post('/BuscarP','Personas\PersonaXControlador@BuscarP');
    route::get('/SeleccionarP/{id_persona}/{codigo_transaccion}','Personas\PersonaXControlador@SeleccionarP');
    route::get('/seleccionarpersona/{id_persona}/{nombre}/{ap_paterno}/{fecha_nacimiento}/{codigo_transaccion}','Persona\PersonaControlador@SeleccionarPersona');

    //------------------------MEDICOS---------------------------------
    route::resource('medico','Personas\MedicoControlador');
    route::post('medico\search',['as'=>'medico\search','uses'=>'Personas\MedicoControlador@search']);

    
    //----------------------------------SEGUROS--------------------------------
    Route::post('/seguro','Seguro\SeguroControlador@ObtenerSeguros');
    
    
    //-------------PACIENTES-------------------------
    route::resource('paciente','Personas\PacienteControlador');
    route::resource('menu','Acciones\MenuControlador'); //-------OPCIONES DE PACIENTE---------------
    Route::get('/frmbusquedapaciente/{codigo_transaccion}', 'Paciente\PacienteControlador@FormBusquedaPaciente');
    Route::post('buscarpacientes','Paciente\PacienteControlador@BuscarPacientes');
    Route::get('/seleccionarpaciente/{id_paciente}/{nombre}/{ap_paterno}/{fecha_nacimiento}/{codigo_transaccion}', 'Paciente\PacienteControlador@SeleccionarPaciente');
    //Route::get('/lstopcionpaciente', 'Paciente\PacienteControlador@listaropciones');
    Route::get('/lstopcionpaciente/{id_persona}', function ($id_persona) {
        return view('Persona.Paciente.lstopcionpaciente',["id_persona"=>$id_persona]);// conozca a TimNet
    });
    
    
    //---------------------CITAS-----------------------------
    route::resource('cita','Cita\CitasControlador');
    route::get('cita\search',['as'=>'cita\search','uses'=>'Cita\CitasControlador@search']);

    route::post('/BuscarC','Cita\CitasXControlador@BuscarC');
    //---------------------HISTORIA---------------------------
    Route::get('frmhistoria','Historia\HistoriaControlador@FormHistoria');
    Route::post('/historia', 'Historia\HistoriaControlador@RegistrarHistoria');

    //------------REPORTES-------------------------
    Route::get('RptHistorial', 'Reportes\ReportesControlador@HistorialPaciente');
    //PAGINAS ESTATICAS//
    //Internas Aplicacion
    Route::get('/acerca', function () {
        return view('General.Aplicacion.pstacerca');// conozca a TimNet
    });
    Route::get('/contacto', function () {
        return view('General.Aplicacion.frmcontacto');// form contacto
    });
    Route::get('/faq', function () {
        return view('General.Aplicacion.pstfaq');// form preguntas frecuentes
    });
    Route::get('/privacidad', function () {
        return view('General.Aplicacion.pstlegalprivacidad');// form terminos de privacidad
    });
    Route::get('/terminouso', function () {
        return view('General.Aplicacion.pstlegaltermino');// form terminos de uso
    });
    Route::get('/sugerencia', function () {
        return view('General.Aplicacion.frmsugerencia');// form sugerencias
    });
    Route::get('/tutorial', function () {
        return view('General.Aplicacion.psttutorial');// form tutoriales
    });
    Route::get('/videotutorial', function () {
        return view('General.Aplicacion.pstvideotutorial');// form video tutoriales
    });

    //Menu inicial//
    Route::get('/lstcalendario', function () {
        return view('lstcalendario');// Calendario
    });

});
//PAGINAS ESTATICAS//
    //Externas Portal
    Route::get('/pstempresa', function () {
        return view('General.Portal.pstempresa');// conozca a TimNet
    });
    Route::get('/pstsolucion', function () {
        return view('General.Portal.pstsolucion');// soluciones de TimNet
    });
    Route::get('/pstayuda', function () {
        return view('General.Portal.pstayuda');// Ayuda de la Plataforma
    });
    Route::get('/pstmantenimiento', function () {
        return view('General.Portal.pstmantenimiento');// Pagina en mantenimiento
    });
    Route::get('/pst404', function () {
        return view('General.Portal.pst404');// Pagina no encontrada
    });