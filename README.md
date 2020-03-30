<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Proyecto de clase con Laravel

#### Base de datos en postgres
#### Instalar
    composer require laravelcollective/html
#### Alertas Sweet-alert [documentation](https://realrashid.github.io/sweet-alert/install)  
    composer require realrashid/sweet-alert
#### Clase Seeder para generar datos fake
    php artisan make:seeder Blogseeder
##### Para ejecutar el seeder
    php artisan db:seed --class=Blogseeder
#### Crear [Factory](https://laravel.com/docs/6.x/database-testing#writing-factories) para los datos
    php artisan make:factory BlogFactory --model=Blog
#### Implementar paginado de una tabla [DATA TABLES](https://datatables.net/)
1. Importar los js y css de la libreria 
2. Crear archivo js para implementar el codigo

        $(document).ready(function() {
            $('#blog-table').DataTable();
        } );
#### Revisar
    https://laravel.com/docs/5.7/authentication#introduction-database-considerations

1. Crear modulo de authentication
2. Migrar las tablas 

    
