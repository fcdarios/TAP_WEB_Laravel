@extends('business-casual')

    @section('content')

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Pagina de administrador de Posts
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <a href="#" class="btn btn-success btn-lg">New</a>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Fecha de Creacion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Autor</th>
                        <th scope="col"><a href="#">View</a></th>
                        <th scope="col"><a href="#">Edit</a></th>
                        <th scope="col"><a href="#">Delete</a></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td >{{$post->titulo}}</td>
                            <td >{{$post->contenido}}</td>
                            <td >{{$post->fecha_creacion}}</td>
                            <td >{{$post->imagen}}</td>
                            <td >{{$post->autor}}</td>
                            <td > <i class="fas fa-eye"></i> </td>
                            <td ><a class="btn btn-warning" href="#">Edit</a></td>
                            <td ><a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
