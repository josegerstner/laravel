<?php

use App\Articulo;

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

Route::get("/", "MiControlador@index");
Route::get("/crear", "MiControlador@create");
Route::get("/articulos", "MiControlador@store");
Route::get("/mostrar", "MiControlador@show");
Route::get("/contacto", "MiControlador@contactar");
Route::get("/galeria", "MiControlador@galeria");

/*
// Usando Raw SQL Query
Route::get("/insertar", function(){
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["CAMISETA", 25.0, "EEUU", "DEPORTES", "NADA QUE SEÑALAR"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["JARRON", 125.0, "CHINA", "CERAMICA", "NADA QUE SEÑALAR"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["PLATO", 15.0, "CHINA", "CERAMICA", "NADA QUE SEÑALAR"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["FLORERO", 45.0, "ESPAÑA", "CERAMICA", "HECHO A MANO"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["NAVAJA", 120.0, "SUIZA", "FERRETERÍA", "MULTIUSOS"]);
});
Route::get("/leer", function(){
    $resultados = DB::select("SELECT * FROM articulos WHERE id=?", [1]);
    foreach($resultados as $articulo){
        return $articulo->Nombre_Articulo;
    }
});
Route::get("/actualizar", function(){
    DB::update("UPDATE articulos SET seccion='DECORACION' WHERE id=?", [1]);
});
Route::get("/borrar", function(){
    DB::update("DELETE FROM articulos WHERE id=?", [1]);
});
*/

/*Usando Elocuent*/
Route::get("/leer", function(){
    // $articulos=Articulo::all();
    // foreach($articulos as $articulo){
    //     echo "Nombre: " . $articulo->Nombre_Articulo . " Precio: " . $articulo->Precio . "<br>";
    // }
    $articulos=Articulo::where("pais_origen", "China")->orderByDesc("Nombre_Articulo")->take(2)->get();
    return $articulos;
});
