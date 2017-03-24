<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('imagen', 'ImagenController');

Route::get('algo', function () {
        return view('Imagenes.frmimagen');
    });
Route::post('/imagen', 'ImagenABMController@RegistrarImagen');