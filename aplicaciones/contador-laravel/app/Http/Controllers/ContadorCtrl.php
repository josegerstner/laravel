<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContadorCtrl extends Controller
{
    public $numero = 0;

    public function mostrar(){
        return view('contador', ['numero'=>$this->numero]);
    }

    //funcion para sumar
    public function add($numero){
        $this->numero = $numero++;
        return view('contador', ['numero'=>$this->numero]);
    }
    //funcion para restar
    public function substract($numero){
        $this->numero = $numero--;
        return view('contador', ['numero'=>$this->numero]);
    }
}
