@extends('../layouts.plantilla')

@section('cabecera')
@stop

@section('contenido')
<form action="post">
    <input type="text" name="NombreArticulo">
    <input type="submit" name="Enviar" value="Enviar">
</form>
@stop
