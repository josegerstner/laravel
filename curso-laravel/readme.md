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
