# Autenticación con Laravel 5
En el curso del canal de Youtube [Aprendible](https://www.youtube.com/watch?v=4yh-4slFyfI&list=PLpKWS6gp0jd-nJe6BFgHT06APfxp5YIsL) o de su página [Aprendible.com](https://aprendible.com/series/autenticacion) se ven los siguientes temas:
- Autenticación HTTP o autenticación básica.
- Artisan make:auth + Explicación detallada.
- Autenticación personalizada.
- Passwords resets.
- Impersonate users.
- Verificación de usuarios.
- Autenticación sin contraseña.
- Autenticación con Google, Facebook y Twitter.
- Laravel guards (múltiples logins).
- Políticas de acceso, roles, permisos.  
  
  
### Primeros pasos para autenticarse
Definimos la base de datos en el archivo .**env**:
```
DB_DATABASE=autenticacion_laravel
DB_USERNAME=root
DB_PASSWORD=root
```  
  
En el archivo /**app/providers/AppServiceProviders.php** importamos lo siguiente:
```
use Illuminate\Support\Facades\Schema;
```  
  
Y dejamos el método boot así:
```
public function boot(){
    Schema::defaultStringLength(191);
}
```  
  
Para crear rápidamente un login, se puede ejecutar el comando:
```
php artisan make:auth
```  
el cual nos creará los cambios necesarios para tener una pantalla de logueo y registro.  
  
