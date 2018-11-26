<?php
use App\Http\Controllers\ContadorCtrl;
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
// Contador
Route::get('/', "ContadorCtrl@mostrar");
Route::get('/contador', "ContadorCtrl@mostrar");
Route::get('/sumar', "ContadorCtrl@sumar");
Route::get('/restar', "ContadorCtrl@restar");
Route::get('/resetear', "ContadorCtrl@resetear");
