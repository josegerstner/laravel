<?php

Route::get('/', function () {
    return 'Esta es la url raíz';
});

// Route::post(); <- lo utilizamos más que nada para almacenar registros en nuestra base de datos
// Route::put(); <- para actualizar los registros
// Route::delete(); <- para eliminar los registros
// accedemos a estos métodos por medio de formularios

Route::get('products', function () {
    return 'Listado de productos';
});
