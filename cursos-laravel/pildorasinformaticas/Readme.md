# Curso Laravel de **pildorasinformaticas**  
  
[Ver el curso en su canal de Youtube](https://www.youtube.com/playlist?list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh)  
  
# Laravel
===
  
Laravel es un framework que utiliza el patrón de diseño Modelo Vista Controlador.  
	Modelo: peticiones a BBDD  
	Vista: documentos HTML  
	Controlador: intermediario entre Modelo y Vista  
Utiliza el concepto de modularización, dividir una aplicación en módulos o partes.  
  
# Instalación
*Omití toda la parte de la instalación porque ya lo tengo instalado*  
Debemos tener composer y php como se indica en la [documentación de Laravel](https://laravel.com/docs)  
  
Instalamos Laravel globalmente:
```  
composer global require "laravel/installer"  
```    
Básicamente se creó una aplicación llamada Laravel con el siguiente comando:  
```  
laravel new Laravel  
```  
  
# Las Rutas (*routes*):
Hacen referencia a las url de la aplicación.  
Se configuran en el archivo /*routes*/*web.php*  
  
En ese archivo encontraremos cógido parecido al que se muestra a continuación:  
```  
Route::get('/', function () {  
    return view('welcome');  
});  
```  
Donde la ruta */* indica que cuando ingresemos a **localhost:8000** retornará una vista llamada *welcome*.  
Esto se puede modificar, tanto la ruta como lo que devuelve.  
Podemos pasar parámetros de la siguiente manera:  
```  
Route::get('/post/{id}/{nombre}', function ($id, $nombre) {
    return "Este es el post nº " . $id . " creado por " . $nombre;
});
```  
Si quisiéramos restringir el tipo de dato que se ingresa en cada parámetro, deberíamos usar las *expresiones regulares de PHP*.  
```  
Route::get('/post/{id}/{nombre}', function ($id, $nombre) {  
    return "Este es el post nº " . $id . " creado por " . $nombre;  
})->where('nombre', '[a-zA-Z]+');  
```  
  
# Los Controladores (*controllers*):
Son los mediadores entre el modelo (o la base de datos) y las vistas.  
Se encuentran en la carpeta /*app*/*Http*/*Controllers*. El archivo *Controller.php* es el que controla por defecto toda la aplicación. El código que tiene es el siguiente:  
```  
<?php  
  
namespace App\Http\Controllers;  
  
use Illuminate\Foundation\Bus\DispatchesJobs;  
use Illuminate\Routing\Controller as BaseController;  
use Illuminate\Foundation\Validation\ValidatesRequests;  
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;  
  
class Controller extends BaseController  
{  
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;  
}  
```  
- namespace : indica el entorno donde aplica ese archivo. Es como si en Java definiésemos el packaga al que pertenece una clase.  
- use : importa diferentes clases o librerías.  
  
Para **crear un nuevo controlador** tenemos dos opciones:  
- *a mano* : lo creamos dentro de la carpeta Controllers indicando el namespace e importando las clases necesarias.  
Creamos un archivo llamado *EjemploController.php*. Indicamos el mismo namespace que Controller.php y heredamos de Controller.php. Además creamos una función pública que se llame *inicio* que retorne un string:  
```  
<?php  
  
namespace App\Http\Controllers;  
  
class EjemploController extends Controller  
{  
    public function inicio(){  
        return "Estás en el inicio del sitio";  
    }  
}  
```  
Para poder utilizarlo, debemos llamarlo desde una ruta. Creamos una ruta para una url /*inicio* y luego llamamos al controlador con **NombreDelControlador@FuncionUtilizada**, como se muestra a continuación:  
```  
Route::get('/inicio', "EjemploController@inicio");  
```  
  
- *usando artisan* : en la carpeta raíz del proyecto y ejecutamos:  
```  
php artisan make:controller Ejemplo2Controller
```  
De esta manera, se crea el archivo Ejemplo2Controller.php en la carpeta Controllers.  
También podemos crear controladores con funciones ya definidas que podrían sernos útiles:
```  
php artisan make:controller --resource Ejemplo3Controller
```  
Y nos crea un controlador *Ejemplo3Controller* con varias funciones como: index, create, store, etc.  
  
### Paso de parámetros  
Desde la ruta donde llamamos al controlador, podemos indicarle que se le pasará un parámetro:  
```  
Route::get('/inicio/{id}', "EjemploController@index");  
```  
Para que el controlador esté preparado para recibir este valor, debemos modificar la función:  
```  
public function index($id)  
{  
	return "Estás en la página de inicio del sitio y el valor pasado por parámetro pasado es " . $id;  
}  
```  
  
  
### Creación de un sitio web  
Para crear un sitio web, debemos saber que las vistas se ubican en la carpeta **/*resources*/*views*** y tienen que tener la extensión **.blade.php** por convención.  
Por eso cuando vemos que las rutas devuelven una vista *return view('welcome');*, la vista se llama **welcome.blade.php**.  
  
Una vez aclarado este punto, pasamos a la creación de un controlador con el que nos manejaremos:  
```  
php artisan make:controller PaginasController
```  
Ahora le creamos una función inicio como teníamos antes, pero retornando la vista 'welcome'.
```
public function inicio()  
{  
	return view("welcome");  
}  
```  
Y para finalizar, cambiamos la ruta apuntando al controlador:  
```  
Route::get('/', "PaginasController@inicio");  
```  

### Ver la estructura de nuestro sitio web
Para ver todas las rutas que hay en la aplicación, tenemos el siguiente comando:  
```  
php artisan route:list
```  
  
  
---  

  
# Laravel_2
===
  
Creamos un nuevo proyecto y nuestro controlador con:  
```  
composer global require "laravel/installer"  
laravel new Laravel_2  
cd Laravel_2  
php artisan make:controller --resource MiControlador  
```  
Esto nos crea el archivo *MiControlador.php* en la carpeta /*app*/*Http*/*Controllers*.  
Cambiamos la función index para que nos devuelva la vista 'welcome'.  
  
Desde el explorador de archivos, creamos tres vistas más: crear, mostrar, articulos. Recordar siempre la extensión .blade.php.  
Luego en el controlador, modificamos la función show para que retorne la vista mostrar, lo mismo para store y artículos y create y crear. Además, sacamos los parámetros que reciben store y show para que nos facilite probar por el momento. Nos quedará algo así:  
```  
public function create(){  
	return view("crear");  
}  
  
public function store(){  
	return view("articulos");  
}  
  
public function show(){  
	return view("mostrar");  
}  
```  
También tenemos que agregar las rutas apuntando a nuestro controlador.  
```  
Route::get("/", "MiControlador@index");  
Route::get("/crear", "MiControlador@create");  
Route::get("/articulos", "MiControlador@store");  
Route::get("/mostrar", "MiControlador@show");  
```  
Vemos si funciona entrando a cada url.  
  
# Bootstrap  
Agregamos [Bootstrap](https://getbootstrap.com/) a alguna página de nuestro proyecto como se muestra en la documentación.  
Podemos agregar los enlaces en las páginas o descargarlo y reemplazar en la carpeta /*public* las carpetas **css** y **js** con las carpetas css y js que trar Bootstrap.  
  
Si elegimos la opción de reemplazar las carpetas css y js, tenemos que linkear desde el *head* del html con la función **{{ asset }}** de la siguiente manera para que funcione Bootstrap:  
```  
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
```  
  
# Blade  
### ¿Qué es Blade?  
Es un motor (constructor) de plantillas que viene con Laravel.  
### ¿Para qué sirve?  
Crear vistas de forma más sencilla y limpia.  
### ¿Cómo lo hace?  
- Reutilizando código.  
- Creando código más limpio evitando el uso de etiquetas php y html (en lo posible).  
- Modularizando:  
    - Templates.  
	- Partials.  
  
La idea de *Blade* es armar una plantilla maestra para que las páginas que vayamos armando hereden los funcionalidades comunes de esa plantilla maestra para hacer menos código y, por lo tanto, tener menos errores en la práctica.  
Para crear esta plantilla maestra nos ubicamos dentro de la carpeta *views* y creamos otra llamada **layouts**. Puede llevar cualquier nombre, pero por convención se llama así.  
Dentro de esta carpeta creamos el archivo **plantilla.blade.php** que va a ser nuestra plantilla maestra, de la que van a heredar las demás. Creamos la estructura html base de cualquier página y dejamos en el body algo así:  
```  
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
```  
Las funciones de Blade empiezan con **@**.  **@yield** recibe un string que 