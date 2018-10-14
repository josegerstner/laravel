# Aprendiendo Laravel con:
[Curso de Udemy gratuito](https://www.udemy.com/introduccion-a-laravel-5-primeros-pasos-framework-php/)

## Configurar workspace:
En caso de que se quiera setear un espacio de trabajo, se debe cambiar en el archivo "\apache\conf\httpd.conf" las siguientes líneas
```
DocumentRoot "E:/xampp/htdocs"
<Directory "E:/xampp/htdocs">
```
por la carpeta donde tendremos todas nuestras páginas
```
DocumentRoot "~\workspace\"
<Directory "~\workspace\">
```  
  
Creamos el proyecto Laravel dentro de nuestro workspace con el comando
```
composer create-project laravel/laravel probando-laravel --prefer-dist
```
  
## Routing
Las rutas se configuraban en el archivo /app/Http/routes.php del proyecto. En la versión que tengo hay una fichero /routes/web.php  
Las vistas se crean en /resources/views con la extensión .**blade.php** por convención.  
  
## Comandos artisan
Dentro del proyecto Laravel podemos utilizar varios comandos que pueden ser útiles para organizarse:
- **php artisan list**: para listar todos los comandos disponibles de artisan.

## Vistas en Laravel
Podemos pasarle variables a las vistas como arrays o utilizando el método with como se muestra en el archivo web.php.  


## Introducción a Blade
Podemos crear una carpeta dentro del fichero **views** del proyecto y routear a un archivo.blade.php con un punto (también permite la barra).
En las vistas de Blade mostramos información usando dobles llaves para encerrar variables {{$variable}}. También nos permite con llave - doble signo de exclamación {!!$variable!!} o como variables php <?=$variable?>.  
  
###Condicionales:
- **Condición ternaria**:
```
Condición ? Verdadero : Falso
```
- **isset($variable)**: evalúa si una variable está definida.  
- **is_null($variable)**: evalúa si el resultado de una variable es nulo.  
- _@if(condicion)_: evalúa la veracidad de la condición.
```
@if(condicion)
    verdadero
@else
    falso
@endif
```
- _@for()_: repite el ciclo hasta que no se cumpla la condición.
```
@for(inicializo variable; condicion; incremento variable)
    ciclo
@endfor
```  
- _@while()_: repite el ciclo hasta que no se cumpla la condición.
```
@while(condicion)
    ciclo
@endwhile
```
- _@foreach()_: recorre listas o colecciones.
```
@foreach(lista as objeto)
    {{objeto}}
@endforeach
```  
  
**Nota**: Si tenemos que definir una variable o hacer una operación con una variable y no queremos que se vea en nuestra vista, debemos utilizar una etiqueta de php en lugar del operador de blade {{}}
```
<?php $i = 0; ?>
<?php $i++; ?>
```  
  
##Insertar una vista dentro de otra vista
Se utiliza el método **include** dentro de la vista donde quiero insertar la otra vista:
```
@include('otravista')
```  
  
##Plantillas en Laravel 5
Las plantillas en Laravel 5 se definen dentro de los directorios de **views** y dentro de **layouts**.  
Podemos definir una plantilla maestra para poder heredar de ella cuando lo necesitemos.  
Para ver cómo se hacer una plantilla, ver /resources/views/layouts/master.blade.php.  
Ver en resources/views/hola-mundo.blade.php cómo se hereda de una plantilla.  
