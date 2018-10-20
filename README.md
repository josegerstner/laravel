# [Laravel][laravel] 5.7

[laravel]: https://laravel.com/
[php]: http://php.net/
[composer]: https://getcomposer.org/
[git]: https://git-scm.com/
[visual]: https://code.visualstudio.com/
[mysql]: https://www.mysql.com/

Next folders contains:
- **aplicaciones** : things I develop.  
- **cursos-laravel** : courses that there are by there.  
  
# Laravel
Tools I need for develop of Laravel:  
- ***[PHP][php]*** : ± >7.2.11 Released.
- ***[Composer][composer]*** : last.  

Optional/Necessary  
- ***[Git][git]*** : last.  
- ***[Visual Studio Code][visual]*** : last.  
- ***[MySQL][mysql]*** : 8.0+.  
  
And a bit idea of MVC is it.  
  
### Use of console  

Global install :   
```  
composer global require "laravel/installer"
```  
  
New project :  
```  
laravel new project  
cd project  
php artisan serve  
```  
*project is our project name*.  
  
Open Browser and **localhost:8000**. If you can see the Laravel page works, you works!  
  
### Laravel arch :
- *.env* : is a configuration file.  
You can connect a database here:
```  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=mydatabase  
DB_USERNAME=root  
DB_PASSWORD=  
```  
  
- /*vendor* : folder that you don't touch. Here is the framework source.  
 
- /*resources*/*views* : build your pages here.  
Extension views 
You can have a folder named layouts and build your pages with style.  
  
- /*routes* : build your links in **web.php**.  
  
- /*app*: contains your models and controllers > /*Http*/*Controllers*.  
  
  