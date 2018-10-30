@extends('layouts.master')

@section('title', 'Contador')


@section('cabecera')
    Contador
@stop

@section('contenido')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="btn-group-vertical btn-group-toggle col-12" data-toggle="buttons">
                <a href="/sumar/{{$num}}" class="btn btn-lg btn-primary active" aria-pressed="true" style="text-align:center">+</a>
                <button type="button" class="btn btn-lg btn-light" disabled>{{ $num }}</button>
                <a href="/restar/{{$num}}" class="btn btn-lg btn-primary active" aria-pressed="true" style="text-align:center">-</a>
            </div>
        </div>
    </div>

@stop
