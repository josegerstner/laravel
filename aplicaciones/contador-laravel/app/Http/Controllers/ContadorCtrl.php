<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContadorCtrl extends Controller
{
    //funcion para sumar
    public function sumar($numero){
        $numero = $numero + 1;
        return $numero;
    }

    public function restar($numero){
        $numero = $numero - 1;
        return
    }
    //funcion para restar
}
