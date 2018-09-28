<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiControlador extends Controller
{
    /**
     * retorna un mensaje de saludo
     */
    public function saludar(){
        return 'Hola Mundo';
    }
}
