<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contador;

class ContadorCtrl extends Controller{

    public $numero = 0;

    public function mostrar(){
        $contador = Contador::find(1);
        if(!$contador){
            $contador = new Contador;
            $contador->numero = 0;
            $contador->save();
        }
        $numero = $contador->numero;
        return view('contador', compact("numero"));
    }

    //funcion para sumar
    public function sumar(Request $request){
        $contador = Contador::find(1);
        $numero = $contador->numero;
        $numero++;
        $contador->numero=$numero;
        $contador->save();
        return redirect('/');
    }

    //funcion para restar
    public function restar(Request $request){
        $contador = Contador::find(1);
        $numero = $contador->numero;
        $numero--;
        $contador->numero=$numero;
        $contador->save();
        return redirect('/');
    }

    //funcion para resetear
    public function resetear(Request $request){
        $contador = Contador::find(1);
        $contador->numero=0;
        $contador->save();
        return redirect('/');
    }
}
