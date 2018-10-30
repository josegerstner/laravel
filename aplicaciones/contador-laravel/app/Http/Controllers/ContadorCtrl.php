<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContadorCtrl extends Controller{

    public $numero = 0;

    public function mostrar(){
        return view('contador', ['num'=>$this->numero]);
    }

    //funcion para sumar
    public function sumar($num){
        $this->numero=++$num;
        $num=$this->numero;
        $this->mostrar();
    }
    //funcion para restar
    public function restar($num){
        $this->numero=--$num;
        $num=$this->numero;
        $this->mostrar();
    }
}
