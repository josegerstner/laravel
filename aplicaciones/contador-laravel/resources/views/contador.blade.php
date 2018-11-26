@extends('layouts.master')

@section('title', 'Contador')


@section('cabecera')
    Contador
@stop

@section('contenido')
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="btn-group-vertical btn-group-toggle col-12" data-toggle="buttons">
                <input type ='button' class="btn btn-lg btn-primary"  value = '+' onclick="location.href = '{{ '/sumar' }}'"/>
                <button type="button" class="btn btn-lg btn-light" disabled>{{ $numero }}</button>
                <input type ='button' class="btn btn-lg btn-primary"  value = '-' onclick="location.href = '{{ '/restar' }}'"/>
            </div>
            <div class="btn-group-vertical btn-group-toggle col-12 pt-5" data-toggle="buttons">
                <input type ='button' class="btn btn-lg btn-dark"  value = 'Resetear' onclick="location.href = '{{ '/resetear' }}'"/>
            </div>
        </div>
    </div>

@stop
