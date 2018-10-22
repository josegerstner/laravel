# Curso Laravel de **pildorasinformaticas**  
  
[Ver el curso en su canal de Youtube](https://www.youtube.com/playlist?list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh)  
  
Laravel
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

  
Laravel_2
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

### Sintaxis de Blade  
Las funciones de Blade empiezan con **@**.  
**@yield** : utilizando la directiva @yield dentro de la plantilla principal podemos indicar secciones (pasando como argumento el nombre de la sección) y luego en plantillas individuales podemos colocar el contenido de dichas secciones:  
```  
@extends("layouts.plantilla")

@section("cabecera")
    <h1>Contacto</h1>
@endsection

@section("infoGeneral")
    <p>Aquí iría el contenido principal de la página.</p>
@endsection

@section("pie")

@endsection

```  
  
### Parámetros, condicionales y bucles  
También permite simplificar el uso de variables o parámetros que recibe una vista.  
Si tenemos una vista llamada *galeria* ruteada con el controlador, y en el controlador tenemos una función galería que le pase un parámetro a la vista, podemos manejar ese parámetro usando llaves dobles **{{ }}**:  
**en web.php**:  
```  
Route::get("/galeria", "MiControlador@galeria");  
```  
**en MiControlador.php**:  
```  
public function galeria(){  
    $alumnos = ["Ana", "Sara", "Antonio", "Manuel"];  
    return view("galeria", compact("alumnos"));  
}  
```  
**en galeria.blade.php**:  
```  
@section("infoGeneral")  
  
    @if(count($alumnos))  
        <table width="50%" border="1">  
        @foreach($alumnos as $persona)  
            <tr>  
                <td> {{ $persona }} </td>  
            </tr>  
        @endforeach  
        </table>  
  
    @else  
        {{ "Sin alumnos" }}  
  
    @endif  
  
@endsection  
```  
Podemos observar que también se pueden utilizar **condicionales** y **bucles**, que también empiezan empiezan con *@* y tienen un cierre.  
En el ejemplo tenemos un *if* que si tenemos alumnos, se crea una tabla con el contenido de cada uno. Si no hay alumnos en el string, muestra un mensaje.  
  
### Bootstrap & Blade  
Si queremos usar componentes Bootstrap en nuestras plantillas Blade:
- Primero tenemos que referenciar las librerías de Bootstrap en nuestra plantilla principal como se vio anteriormente (sino ver documentación de Bootstrap).  
- Buscamos en la página de los componentes de Bootstrap el que queremos usar y copiamos el código.  
- Creamos un archivo en la carpeta **layouts** para pegar el componente. Por ejemplo, si copiamos el código de un *navbar*, creamos un archivo **navbar.blade.php** y lo pegamos dentro.
- Para utilizarlo dentro de alguna sección de la plantilla principal, justo antes del *yield* correspondiente usamos la función *include* e incluimos la página que queremos que esté siempre, por ejemplo el navbar.  
La plantilla principal de nuestro proyecto, nos quedaría algo parecido a lo siguiente:  
```  
<!DOCTYPE html>  
<html>  
<head>  
    <meta charset="utf-8" />  
    <title>Page Title</title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
</head>  
  
<body>  
    @include("layouts.navbar")  
    @yield("cabecera")  
  
    @include("layouts.card")  
    @yield("infoGeneral")  
  
    @yield("pie")  
    Aquí iría el texto del pie.  
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
</body>  
</html>  
```  
  
  
# Bases de datos  
Laravel nos permite utilizar varios tipos de bases de datos, tanto relacionales como no relacionales.  
En el archivo /*app*/*config*/***database.php*** tenemos la devolución de un array con la configuración de la base de datos.  
En la línea  
```  
'default' => env('DB_CONNECTION', 'mysql'),  
```  
vemos que se está seteando en la variable de entorno que la base de datos *default* que se usa es *mysql*. Si quisiéramos usar otra, la podemos cambiar desde acá.  
Otro archivo muy importante, es **.env** que se encuentra en la raíz del proyecto. Este archivo contiene las variables de entorno del proyecto, como la encriptación, si está en modo debug, el servidor de mails, etc; además de tener configuración de la base de datos. Este es el archivo del que *Laravel* toma la información necesaria para funcionar correctamente.  
```  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=homestead  
DB_USERNAME=homestead  
DB_PASSWORD=secret  
```  
  
### Pasos para crear tablas en BBDD  
1- Crear archivo migrations  
2- Configurar archivo migrations  
3- Ejecutar comando '***php artisan migrate***'  
  
Por el momento, sólo tenemos dos *migrations* que nos trae Laravel porque son útiles para casi cualquier aplicación. Se encuentran en la carpeta /*database*/*migrations* y sirven para crear una tabla de usuarios y otra para reestablecer contraseñas.  
Vemos que todos los migrations tienen funciones llamadas **up** y **down** que son las encargadas de crear y eliminar una tabla respectivamente.  
Para impactar estas tablas en nuestra base de datos, necesitamos tener la base de datos creada previamente. Si al momento de instalar Laravel usamos la opción de instalar *Homestead* y *Vagrant*, es probable que ya esté creada una base de datos llamada Homestead dentro de nuestra máquina virtual. Por el contrario, necesitamos crear una base de datos y configurar nuestro archivo *.env* para tener una conexión exitosa.  
Por ejemplo, si queremos tener una base de datos MySQL llamada *pruebas_laravel*, debemos abrir la consola:  
```  
mysql -uroot -p  
```  
donde root es el usuario. Luego nos pide que ingresemos la contraseña del usuario en cuestión. Supongamos que el usuario root no tiene contraseña, entonces sólo le damos a ENTER.  
```  
create database pruebas_laravel;  
```  
Esto nos creará la base de datos. Para que el proyecto la reconozca, debemos cambiar la configuración del archivo **.env**:  
```  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=pruebas_laravel  
DB_USERNAME=root  
DB_PASSWORD=  
```  
De este modo, Laravel se conectará a nuestra base de datos MySQL llamada pruebas_laravel con el usuario root que no tiene contraseña.  
Para impactar los migrations, sólo tenemos que ejecutar el comando:  
```  
php artisan migrate  
```  
y listo! Nos fijamos en MySQL que ahora dentro de la base de datos pruebas_laravel tenemos dos tablas nuevas que corresponden a los migrations de nuestra aplicación.  
  
### Crear nuestros propios migrations  
Para crear un nuevo migration, tenemos que ejecutar el siguiente comando:  
```  
php artisan make:migration create_articulos_table --create="articulos"  
```  
Esto nos crea un migration estándar para una tabla llamada artículos. Es necesario seguir el estandar de poner **create_** adelante del nombre del migration o tabla y luego el **_table** para tablas nuevas como se muestra en el ejemplo anterior. Con el *--create* indicamos el nombre de la tabla que queremos. Nos quedará un archivo en la carpeta de migrations con el momento en que se creó el mismo. Lo abrimos y modificamos la función up:  
```  
public function up(){  
    Schema::create('articulos', function (Blueprint $table) {  
        $table->increments('id');  
        $table->string("Nombre_Articulo");  
        $table->integer("Precio");  
        $table->string("pais_origen");  
        $table->text("observaciones");  
        $table->timestamps();  
    });  
}  
```  
El campo *observaciones* es text en lugar de string porque necesita tener más caracteres de lo que tiene normalmente un campo *nombre*.  
Luego con el comando ***php artisan migrate*** impactamos nuestro migration en la base de datos.  
Como podemos ver en MySQL, el campo *Precio* es del tipo integer. Si queremos saber qué tipos de datos soporta Laravel y cómo manejarlos desde nuestros migrations, tenemos que ir a la documentación de Laravel en la sección [migrations](https://laravel.com/docs/5.7/migrations#columns) y fijarnos cómo hacerlo.  
Para arreglar este problema, debemos ejecutar el comando  
```  
php artisan migrate:rollback
```  
para deshacer el último cambio que tuvimos en la base de datos desde php artisan con migrate.  
Luego cambiamos el campo con el tipo que queremos:  
```  
$table->decimal("Precio");  
```  
y volvemos a ejecutar ***php artisan migrate*** para impactar la tabla modificada.  
  
### Modificar una tabla  
Para modificar una tabla creada hace tiempo no nos sirve hacer un rollback, ya que el rollback sólo deshace la última migración. Tampoco nos sirve eliminar la tabla y volverla a crear modificada, ya que esta puede tener registros ingresador previamente.  
Para modificar una tabla correctamente, debemos crear una nueva migración:  
```  
php artisan make:migration agrega_seccion_articulos --table=articulos  
```  
Esto nos crea un nuevo archivo en la carpeta *migrations*. Entramos y agregamos el nuevo campo 'seccion', tanto en la función **up** como en la función **down**.  
```  
public function up(){  
    Schema::table('articulos', function (Blueprint $table) {  
        $table->string("seccion");  
    });  
}  
public function down(){  
    Schema::table('articulos', function (Blueprint $table) {  
        $table->dropColumn("seccion");  
    });  
}  
```  
Por último ejecutamos el comando ***php artisan migrate*** y tenemos la tabla modificada.  
  
### Php artisan migrate utils  
Si por alguna razón queremos eliminar todas las tablas: ***php artisan migrate:reset***.  
Si queremos eliminar todas las tablas, pero impactarlas automáticamente después: ***php artisan migrate:refresh***.  
Si queremos saber si hay algun migration sin ejecutar: ***php artisan migrate:status***.  
  
### CRUD (Create, Read, Update, Delete)  
Tenemos dos formas de manipular los registros de nuestra BBDD con Laravel.  
#### Raw SQL Query:  
La primera forma de manipular los registros de una base de datos es usar consultas SQL dentro de nuestro código con la técnica llamada **Raw SQL Query**. Esta no es la mejor opción, pero es bueno saberla.  
Si queremos ingresar un artículo en nuestra tabla artículos, lo podemos hacer desde una ruta *insertar* en nuestro archivo *web.php* usando *raw sql query*.  

- **INSERT**:  
```  
Route::get("/insertar", function(){  
    DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)", ["JARRON", 15.2, "JAPON", "CERAMICA", "GANGA"]);  
});  
```  
Vemos que la función utilizada es *insert*.
  
Lo mismo deberíamos hacer para cada uno de los estados.  
  
- **SELECT**:  
```  
Route::get("/leer", function(){  
    $resultados = DB::select("SELECT * FROM articulos WHERE id=?", [1]);  
    foreach($resultados as $articulo){  
        return $articulo->Nombre_Articulo;  
    }  
});  
```  
La función utilizada es *select*. En este caso necesitamos guardar el resultado de la consulta en una variable y luego recorrer esa variable para que nos muestre un campo. Esto se debe a que la consulta nos devuelve una tabla.  
Guardamos el resultado de la consulta en una variable *$resultados*.  
Luego recorremos *$resultados* con un **foreach** y devolvemos el campo *Nombre_Articulo* del *$articulo*.  
  
- **UPDATE**:  
```  
Route::get("/actualizar", function(){  
    DB::update("UPDATE articulos SET seccion='DECORACION' WHERE id=?", [1]);  
});  
```  
Vemos que la función utilizada es *insert*. Notar que al tener que utilizar comillas en la consulta, tengo que usar el tipo de comillas que no esté envolviendo a la consulta, ya que sino nos daría un error porque el intérprete creería que estamos cerrando la consulta y no es así.  
  
- **DELETE**:  
```  
Route::get("/borrar", function(){  
    DB::update("DELETE FROM articulos WHERE id=?", [1]);  
});  
```  
En este caso, la función utilizada es también es *update*.  
  
#### [Elocuent](https://laravel.com/docs/5.7/eloquent)  
La otra forma de manipular los registros de una base de datos es usar **[Elocuent](https://laravel.com/docs/5.7/eloquent)**.  
[Elocuent](https://laravel.com/docs/5.7/eloquent) es un ORM (Object Relational Mapping). Un ORM utiliza la programación orientada a objetos para manipular una base de datos. Para esto, vamos a necesitar clases o ***modelos***. Un modelo se crea para cada tabla de la base de datos utilizando el mismo nombre pero en singular. Entonces para manipular la tabla *articulos* vamos a necesitar un modelo llamado *Articulo*. Estos objetos tienen *propiedades* y *métodos* que nos permitirán manipular los registros de la base de datos sin tener que usar lenguaje **SQL**. Ejecutemos el comando:  
```  
php artisan make:model Articulo  
```  
Vemos que en la ruta /**app** se nos crea un archivo **Articulo.php** que es básicamente una clase que no tiene nada en su interior, salvo que hereda de otra clase que se llama **Model** que pertenece al core del framework (/vendor/laravel/framework/src/Illuminate/Database/Eloquent) con todos los métodos necesarios para manipular el modelo.  
Si por alguna razón, la tabla no se llama como debería, tenemos que indicarle al modelo el nombre de la tabla en una variable **protected**:  
```
<?php  
namespace App;  
use Illuminate\Database\Eloquent\Model;  
class Articulo extends Model  
{  
    protected $table = "misArticulos";  
}  
```  
Lo mismo pasa si no tenemos un campo *id* que sea clave primaria. En ese caso, debemos crear una variable **protected** con el nombre de la clave, por ejemplo 'articulo_id':  
```  
<?php  
namespace App;  
use Illuminate\Database\Eloquent\Model;  
class Articulo extends Model  
{  
    protected $primaryKey = "articulo_id";  
}  
```  
  
Para usar Elocuent debemos tocar el archivo de las rutas *web.php*.
```  
Route::get("/leer", function(){  
    $articulos = Articulo::all();  
    foreach($articulos as $articulo){
        echo $articulo->Nombre_Articulo;
    }
});  
```  
La función **all()** nos devuelve todos los registros que sean del tipo *Articulo*. En otras palabras nos devuelve todos los registros de la tabla *articulos*.  
*Nota*: si al ingresar a la página da error, tal vez es necesario importar la clase Artículo al comienzo del archivo *web.php* de la siguiente manera:  
```  
<?php  
  
use App\Articulo;  
```  
  
Si queremos usar la cláusula **WHERE** u otras cláusulas con *Elocuent*, debemos hacer por ejemplo:  
```  
Route::get("/leer", function(){  
    $articulos=Articulo::where("pais_origen", "China")->orderByDesc("Nombre_Articulo")->take(2)->get();  
    return $articulos;  
});  
```  
