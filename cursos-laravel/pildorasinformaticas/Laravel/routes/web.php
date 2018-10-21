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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/contacto', function () {
    return "Aquí podrás contactar";
});


// pasamos parámetros y seteamos el tipo de dato de nombre
Route::get('/post/{id}/{nombre}', function ($id, $nombre) {
    return "Este es el post nº " . $id . " creado por " . $nombre;
})->where('nombre', '[a-zA-Z]+');

// utilizamos un controlador
Route::get('/inicio', "Ejemplo3Controller@index");
Route::get('/inicio/{id}', "Ejemplo3Controller@otroindex");

// Creación del sitio web
Route::get('/', "PaginasController@inicio");
Route::get('/inicio', "PaginasController@inicio");
Route::get('/quienesSomos', "PaginasController@quienesSomos");
Route::get('/dondeEstamos', "PaginasController@dondeEstamos");
Route::get('/foro', "PaginasController@foro");
