@extends('layouts.master')

@section('title', 'contador')


@section('header')
    <h2>Contador</h2>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="btn btn-sm btn-primary">-</div>
            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <div class="btn btn-sm btn-primary">+</div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <p></p>
@stop
