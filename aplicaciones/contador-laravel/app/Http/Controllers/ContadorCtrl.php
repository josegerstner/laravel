<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContadorCtrl extends Controller{

    public $numero = 0;

    public function mostrar(){
        return view('contador', ['num'=>$this->numero]);
    }

    //funcion para sumar
    public function sumar(Request $request){
        $var1=$request->session()->get('num');
if(isset($var1)){
    $request->session()->put('num', ++$var1); 
    return view('contador', ['num'=>$request->session()->get('num')]);
}else{
    $var1=0;
    $var1 = $request->session()->put('num', ++$var1);
    return view('contador', ['num'=>$var1]);
}

    }
    //funcion para restar
    public function restar($num){
        $this->numero=--$num;
        $num=$this->numero;
        $this->mostrar();
    }
}
