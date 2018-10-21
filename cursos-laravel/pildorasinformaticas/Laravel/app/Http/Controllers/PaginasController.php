<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function inicio(){
        return view("welcome");
    }
    public function quienesSomos(){
        return "somos lo más";
    }
    public function dondeEstamos(){
        return "en todas partes, somos como Jesús";
    }
    public function foro(){
        return "Ah re Taringa!";
    }
}
