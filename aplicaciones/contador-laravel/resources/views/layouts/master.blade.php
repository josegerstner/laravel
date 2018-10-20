<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="/img/laravel.png"/>
    </head>
    <body>
        @section('header')
            MASTER HEADER
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')
            MASTER FOOTER
        @show
    </body>
</html>
