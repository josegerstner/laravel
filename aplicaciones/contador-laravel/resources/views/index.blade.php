@extends('layouts.master')

@section('title', 'home')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark indigo">
        <a class="navbar-brand" href="#/!">
        <!-- <img src="img/pokebolas/pokebola.png" alt="pokebola" class="imagenEncabezado" > -->
         Pokemon Al GO III</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Contador </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Contador2 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Contador3 </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" ui-sref="entrenador"><i class="fa fa-user" aria-hidden="true"></i> Entrenador<span class="sr-only">(current)</span> <img src="img/entrenadores/ash.jpg" class="imagenEncabezado img-fluid rounded-circle hoverable" /> </a>
                </li> -->
            </ul>
        </div>
    </nav>
@stop

@section('content')
<div class="container-fluid">

</div>
@stop

@section('footer')

@stop
