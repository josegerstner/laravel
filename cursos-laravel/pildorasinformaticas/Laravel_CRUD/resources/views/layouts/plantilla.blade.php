<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CRUD Laravel - Pildoras Informáticas</title>
    <link rel="icon" href="/images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        .imagenCabecera{
            float:right;
            width:150px;
        }
        .cabecera{
            text-align:center;
            font-size:x-large;
            font-weight: bold;
            font-family:Tahoma, Geneva, sans-serif;
            margin-bottom:100px;
            color:#090;
        }
        .contenido form{
            margin:0 auto;
        }
        .pie{
            position:relative;
            bottom:0px;
            width:100%;
            font-size:0.7em;
            /* margin-bottom:15px; */
        }
        .pie img{
            width:150px;
        }
    </style>
</head>
<body>

<div class="cabecera">
    @include('layouts.header')
    @yield('cabecera')
    <img src="/images/logo.png" class="imagenCabecera pr-3" alt="logo">
</div>
<br>
<div class="contenido container-fluid">
    @yield('contenido')
</div>
<br>
<div class="pie">
    @include('layouts.footer')
    @yield('pie')
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
