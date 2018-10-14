
@include('contacto.cabecera', array('nombre' => $nombre))

{{-- Mi comentario de HTML --}}
<h1>Página de contacto {!!$nombre!!} {{-- isset($edad) && !is_null($edad) ? $edad : 'No existe la edad' --}}</h1>
{{-- Condicional if --}}
@if(is_null($edad))
    No existe la edad
@else
    Sí existe la edad: {{$edad}}
@endif
<br><br>


{{-- Bucle for --}}
<?php $numero = 4; ?>
<p>Tabla del {{$numero}}</p>
@for($i = 0; $i <= 10; $i++)
    {{$i.' x '.$numero.' = '.($i*$numero)}}<br>
@endfor
<br><br>


{{-- Bucle while --}}
<?php $x = 1; ?>
@while($x <= 7)
    {{'Hola mundo '.$x}}<br>
    <?php $x++; ?>
@endwhile
<br><br>


{{-- Bucle foreach --}}
<h1>Listado de frutas</h1>
@foreach($frutas as $fruta)
    <p>{{$fruta}}</p>
@endforeach
