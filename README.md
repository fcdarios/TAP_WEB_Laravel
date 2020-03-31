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
#### Crear [Authentication](https://laravel.com/docs/5.7/authentication#introduction-database-considerations)

1. Crear modulo de authentication
2. Migrar las tablas 
3. Copiar Constructor del homeController

#### Crear [Middleware](https://laravel.com/docs/7.x/middleware#introduction)
1. Crear [migracion](https://laravel.com/docs/7.x/migrations) para los roles 

    `php artisan make:migration create_roles_table --create=roles`
2. Dentro del archivo creado de la migracion agregar la columna nombre
    
        `public function up()
         {
             Schema::create('roles', function (Blueprint $table) {
                 $table->id();
                 $table->string("name");
                 $table->timestamps();
             });
         }`
3. Agregar columna de id de roles a la migracion de Users
4. Correr migraciones

        php artisan migrate --path=/database/migrations/2020_03_31_174356_create_roles_table.php
        
5. Crear middleware
        
        php artisan make:middleware isAdmin        
6. Agregar en el archivo kernel app/Http/Kernel.php

      `isAdmin' => \App\Http\Middleware\isAdmin::class,`
      
7. Agregar al constructor del blogControler
    
        $this->middleware('isAdmin');
    




    
