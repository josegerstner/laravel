<?php

use App\Articulo;
use App\Cliente;
use App\Perfil;

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
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["Camiseta", 25.0, "EEUU", "Deportes", "Nada que señalar"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["Jarrón", 125.0, "China", "Cerámica", "Nada que señalar"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["Plate", 15.0, "China", "Cerámica", "Nada que señalar"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["Florero", 45.0, "España", "Cerámica", "Hecho a mano"]);
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["Navaja", 120.0, "Suiza", "Ferretería", "Multiusos"]);
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
    $articulos=Articulo::all();
    foreach($articulos as $articulo){
        echo
        "Nombre: " . $articulo->Nombre_Articulo .
        " Precio: " . $articulo->Precio .
        " País de origen: " . $articulo->pais_origen .
        " Sección: " . $articulo->seccion .
        " Observaciones: " . $articulo->observaciones . "<br>";
    }
    // $articulos=Articulo::where("pais_origen", "China")->orderByDesc("Nombre_Articulo")->take(2)->get();
    // return $articulos;
});

Route::get("/insertar", function(){
    $articulos = new Articulo;

    $articulos->Nombre_Articulo="Pantalones";
    $articulos->Precio=60;
    $articulos->pais_origen="España";
    $articulos->observaciones="Cortes a la piedra";
    $articulos->seccion="Confección";

    $articulos->save();
});

Route::get("/actualizar", function(){
    // $articulos = Articulo::find(6);

    // $articulos->Nombre_Articulo="Pantalones";
    // $articulos->Precio=90;
    // $articulos->pais_origen="España";
    // $articulos->observaciones="Cortes a la piedra";
    // $articulos->seccion="Confección";

    // $articulos->save();
    $articulos = Articulo::find(1);
    $articulos->cliente_id=3;
    $articulos->save();
    $articulos = Articulo::find(2);
    $articulos->cliente_id=1;
    $articulos->save();
    $articulos = Articulo::find(3);
    $articulos->cliente_id=2;
    $articulos->save();
});
Route::get("/actualizarmasivo", function(){
    Articulo::where("seccion", "Cerámica")->update(["seccion"=>"Menaje"]);
});
Route::get("/actualizarvarioscriterios", function(){
    Articulo::where("pais_origen", "España")->where("seccion", "Menaje")->update(["Precio"=>90]);
});

Route::get("/borrar", function(){
    // $articulo = Articulo::find(2);

    // $articulo->delete();
    Articulo::where("seccion", "FERRETERÍA")->delete();
});

Route::get("/insercionvarios", function(){
    // Articulo::create([
    //     "Nombre_Articulo"=>"Impresora",
    //     "Precio"=>50,
    //     "pais_origen"=>"Colombia",
    //     "observaciones"=>"Nada que decir",
    //     "seccion"=>"Informática"
    //     ]);
    Cliente::create(
        // ["Nombre"=>"Paco",
        // "Apellidos"=>"Pérez"]
        ["Nombre"=>"Sandra",
        "Apellidos"=>"López"]
    );

    Cliente::create(
    ["Nombre"=>"María",
        "Apellidos"=>"Rojas"]
    );
});

Route::get("/softdelete", function(){
    Articulo::find(4)->delete();
});
Route::get("/hardDelete", function(){
    $articulo=Articulo::withTrashed()
        ->where('id', 4)
        ->forceDelete();
});

//Relación uno a uno
//Ver el artículo que compró un cliente
Route::get("/cliente/{id}/articulo", function($id){
    return Cliente::find($id)->articulo;
});

//Relación inversa
//Ver el cliente que compró un artículo
Route::get("/articulo/{id}/cliente", function($id){
    return Articulo::find($id)->cliente->Nombre;
});

//actualizar el id del artículo 5 para decir que lo compró el cliente 3
Route::get("/actualizarclienteidarticulo5", function(){
    Articulo::where("id", 5)->update(["cliente_id"=>3]);
});

//Relación uno a muchos
//Ver los articulos que compró un cliente
Route::get("/cliente/{id}/articulos", function($id){
    $articulos = Cliente::find($id)->articulos;
    foreach($articulos as $articulo){
        echo $articulo->Nombre_Articulo . "<br>";
    }
});

Route::get("/cliente/{id}/articulosSuiza", function($id){
    $articulos = Cliente::find($id)->articulos->where('pais_origen', 'Suiza');
    foreach($articulos as $articulo){
        echo $articulo->Nombre_Articulo . "<br>";
    }
});

Route::get("/insercionperfiles", function(){
    Perfil::create(
        ["Nombre"=>"frecuente"]
    );
    Perfil::create(
        ["Nombre"=>"ocasional"]
    );
    Perfil::create(
        ["Nombre"=>"nuevo"]
    );
});

//Relación muchos a muchos
// qué perfiles tiene un cliente
Route::get("/cliente/{id}/perfil", function($id){
    $cliente=Cliente::find($id);
    foreach($cliente->perfils as $perfil){
        return $perfil->Nombre;
    }
});
// qué clientes tienen cierto perfil
Route::get("/perfil/{id}/cliente", function($id){
    $perfil=Perfil::find($id);
    foreach($perfil->clientes as $cliente){
        echo $cliente->Nombre . "<br>";
    }
});

//Realaciones polimórficas
Route::get("/calificacionescliente/{id}", function($id){
    $cliente = Cliente::find($id);
    foreach($cliente->calificaciones as $calificacion){
        echo $calificacion->calificacion;
    }
});
Route::get("/calificacionesarticulo/{id}", function($id){
    $articulo = Articulo::find($id);
    foreach($articulo->calificaciones as $calificacion){
        echo $calificacion->calificacion;
    }
});
