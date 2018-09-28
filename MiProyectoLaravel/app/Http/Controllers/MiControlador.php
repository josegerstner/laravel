<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiControlador extends Controller
{
    /**
     * retorna un mensaje de saludo
     */
    // public function saludar(){
    //     return 'Hola Mundo';
    // }
    public function saludar($nombre){
        return "Hola {$nombre}";
    }
}
