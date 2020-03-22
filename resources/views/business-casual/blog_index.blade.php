@extends('business-casual.business-casual')

    @section('content')

        <div class="row">
            <div class="box">
                @if(session()->get('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Pagina de administrador de Posts
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New</a>
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
                            <td ><a href="#" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                            <td ><a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                            <td ><a href="#" class="btn btn-danger"><i class="fas fa-minus-square"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
