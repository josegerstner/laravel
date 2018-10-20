<?php

use Illuminate\Http\Request;
use App\Product;

Route::get('/', function () {
    return 'Esta es la url raíz';
});

// Route::post(); <- lo utilizamos más que nada para almacenar registros en nuestra base de datos
// Route::put(); <- para actualizar los registros
// Route::delete(); <- para eliminar los registros
// accedemos a estos métodos por medio de formularios

Route::get('products', function () {
    //$products = Product::all();
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('products.index', compact('products'));
})->name('products.index');

Route::get('products/create', function () {
    return view('products.create');
})->name('products.create');


Route::post('products', function (Request $request) {
    $newProduct = new Product;
    $newProduct -> description = $request->input('description');
    //input nos permite capturar el valor de lo que haya enviado el formulario
    $newProduct -> price = $request->input('price');
    $newProduct->save();

    return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');
})->name('products.store');

Route::delete('products/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return $product;
})->name('products.destroy');
