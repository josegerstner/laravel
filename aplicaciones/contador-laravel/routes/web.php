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
    return view('index');
});


// Contador
Route::get('/contador.contador', 'ContadorCtrl');
Route::get('/contador.contador/+', 'ContadorCtrl@sumar');
Route::get('/contador.contador/-', 'ContadorCtrl@restar');
