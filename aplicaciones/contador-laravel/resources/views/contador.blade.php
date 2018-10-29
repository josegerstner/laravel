@extends('layouts.master')

@section('title', 'contador')


@section('header')
    <h2>Contador</h2>
@stop

@section('content')
    <div class="container">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <button type="button" class="btn btn-primary" type="submit" value="restar">-</button>
            <button type="button" class="btn btn-light" disabled>{{ $numero }}</button>
            <button type="button" class="btn btn-primary" type="submit" value="sumar">+</button>
        </div>
    </div>
@stop

@section('pruebas')
    <div class="pruebas h-100">

        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <button type="button" class="btn btn-primary" type="submit" value="restar">-</button>
            <button type="button" class="btn btn-light" disabled>{{ $numero }}</button>
            <button type="button" class="btn btn-primary" type="submit" value="sumar">+</button>
        </div>

        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-primary" type="submit" value="restar">-</button>
            <button type="button" class="btn btn-light" disabled>{{ $numero }}</button>
            <button type="button" class="btn btn-primary" type="submit" value="sumar">+</button>
        </div>

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-primary" type="submit" value="restar">-</button>
            <button type="button" class="btn btn-light" disabled>{{ $numero }}</button>
            <button type="button" class="btn btn-primary" type="submit" value="sumar">+</button>
        </div>
    </div>
@stop

@section('footer')
    <p></p>
@stop
