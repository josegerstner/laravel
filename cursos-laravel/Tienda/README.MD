# Aprende Laravel - Modelos, Migraciones, Rutas, Vistas, etc
[Curso de Udemy](https://www.udemy.com/aprende-laravel-modelos-migraciones-rutas-vistas-etc)

### Crear un nuevo proyecto, la migración y el modelo de productos
Para **crear el proyecto** usamos el comando
```
laravel new Tienda
```

Creamos una base de datos con la que vamos a trabajar.
Por ejemplo, en MySQL
```
CREATE DATABASE productos_laravel;
```

En el archivo .**env** modificamos nuestra conexión con la BBDD.
```
DB_DATABASE=productos_laravel
DB_USERNAME=root
DB_PASSWORD=root
```

Por consola creamos la tabla donde vamos a guardar nuestros productos
```
php artisan make:migration create_products_table
```

Abrimos el archivo del proyecto /database/migrations/....create_products_table.php y agregamos los campos necesarios.
```
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('price');
            $table->timestamps();
        });
    }
```

Para impactar las tablas en la base de datos (que debe estar creada previamente) ejecutamos lo siguiente
```
php artisan migrate
```

Creamos el modelo para la tabla que vamos a utilizar.
Laravel nos aconseja que usemos el mismo nombre de la tabla con la que vamos a comunicar, pero en singular y con la letra mayúscula.
```
php artisan make:model Product
```
Esto creará el modelo con el que vamos a trabajar en la carpeta /**app**.

### Introducción a las rutas de Laravel
Las rutas se almacenan en el archivo **web.php** dentro de la carpeta routes.

#### Ruta y vista de la página principal
Las vistas se alojan dentro de la carpeta /**resources/views**
