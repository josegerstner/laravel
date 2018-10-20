<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContadorCtrl extends Controller
{
    public $numero = 0;

    //funcion para sumar
    public function add(){
        return $numero = $numero + 1;
    }
    //funcion para restar
    public function substract(){
        return $numero = $numero - 1;
    }
}
