<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <script src="main.js"></script>

    <style>
        .contenedor{
            background-color:#F00;
            text-align:center;
        }
        .infoGeneral{
            background-color:#00F;
            margin:200pk 0;
            color:#FFF;
        }
        .pie{
            background-color:#FF0;
        }
    </style>

</head>
<body>
    <div class="contenedor">
        @yield("cabecera")
    </div>

    <div class="infoGeneral">
        @yield("infoGeneral")
    </div>

    <div class="pie">
        @yield("pie")
        Aquí iría el texto del pie.
    </div>
</body>
</html>
