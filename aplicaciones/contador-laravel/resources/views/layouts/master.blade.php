<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Icono de la página -->
        <link rel="icon" type="image/png" href="/img/counter.png"/>
    </head>
    <body>

        @include('layouts.navbar')

        <h1 align="center">
            @section('cabecera')
                Esta es la cabecera
            @show
        </h1>

        <div class="container-fluid d-inline-block justify-content-center">
            @section('contenido')
                <p>Este es el contenido</p>
            @show
        </div>

        <footer class="page-footer indigo center-on-small-only pt-0" style="position: absolute; bottom: 0; width: 100%;">
            @section('footer')
                @include('layouts.pie')
            @show
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
