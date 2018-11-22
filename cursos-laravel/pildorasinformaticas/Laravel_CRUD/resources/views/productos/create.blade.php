@extends('../layouts.plantilla')

@section('cabecera')
INSERTAR REGISTROS
@endsection

@section('contenido')
<div class="row justify-content-center">
    <div class="col col-6 align-self-center">
        <form method="post" action="/productos">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <div class="form-group">
                            <input type="text" class="form-control" name="NombreArticulo" id="NombreArticulo" placeholder="Nombre">
                            {{ csrf_field() }}
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <input type="text" class="form-control" name="Seccion" id="Seccion" placeholder="Sección">
                            {{ csrf_field() }}
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <input type="text" class="form-control" name="Precio" id="Precio" placeholder="Precio">
                            {{ csrf_field() }}
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <input type="text" class="form-control" name="Fecha" id="Fecha" placeholder="Fecha">
                            {{ csrf_field() }}
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <input type="text" class="form-control" name="PaisOrigen" id="PaisOrigen" placeholder="País de Origen">
                            {{ csrf_field() }}
                        </div>
                    </tr>

                    <tr>
                        <button class="btn btn-success btn-lg btn-block" name="Enviar" type="submit">Enviar</button>
                        <button class="btn btn-danger btn-lg btn-block" name="Borrar" type="reset">Borrar</button>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection

@section('pie')

@endsection
