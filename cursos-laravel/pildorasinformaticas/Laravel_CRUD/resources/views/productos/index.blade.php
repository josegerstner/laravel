@extends('../layouts.plantilla')

@section('cabecera')
LEER REGISTROS
@endsection

@section('contenido')
<div class="row justify-content-center">
    <div class="col col-6 align-self-center">
        <form method="post" action="/productos">
            <div class="table-responsive">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Sección</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">País de Origen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <th scope="row">{{$producto->NombreArticulo}}</th>
                                <td>{{$producto->Seccion}}</td>
                                <td>{{$producto->Precio}}</td>
                                <td>{{$producto->Fecha}}</td>
                                <td>{{$producto->PaisOrigen}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection

@section('pie')

@endsection
