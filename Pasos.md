##Laravel
####Paso 0: Conectarse a la base de datos
1. Dentro del archivo .env configurar datos para la conexion
####Paso 1: Crear modelo
    php artisan make:model Blog
#### Paso 2: Dentro del modelo escribir
    protected $table = 'blog';
####Paso 3: Crear funcion en controlador
    public function blog(){
        $posts = Blog::all();
        return view("business-casual/blog", ['posts'=>$posts]);
    }
####Paso 4: Crear vista blog.blade.php
Contenido:

    @extends('business-casual')
    @section('content')
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Company <strong>blog</strong>
                    </h2>
                    <hr>
                </div>
                @foreach ($posts as $post)
                    <div class="col-lg-12 text-center">
                        <img class="img-responsive img-border img-full" src="{{asset('img/'.$post->imagen)}}" alt="">
                        <h2>{{$post->titulo}}
                            <br>
                            <small>{{$post->fecha_creacion}}</small>
                        </h2>
                        <p>{{$post->contenido}}.</p>
                        <a href="#" class="btn btn-default btn-lg">Read More</a>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
#####Paso 5: Listar Blogs para su pagina de administracion


#####Paso 6: Instalar laravel Collective
    composer require laravelcollective/html
#####Paso 7: 

