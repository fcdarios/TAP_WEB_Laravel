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
                        @foreach ($posts as $index => $post)
                            <tr>
                                <td >{{$post->titulo}}</td>
                                <td >{{$post->contenido}}</td>
                                <td >{{$post->fecha_creacion}}</td>
                                <td >{{$post->imagen}}</td>
                                <td >{{$post->autor}}</td>
                                <td>
                                    <a href="#myModal{{$index}}" data-toggle="modal" data-target="#myModal{{$index}}"><i class="fas fa-eye fa-2x"></i></a>
                                </td>
                                <td ><a href="{{ route('admin.edit', $post->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                                <td >
                                    {{ Form::open(array('url' => '/admin/delete/' . $post->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::button('<i class="fa fa-minus-circle" aria-hidden="true"></i>', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Open Modal</button>

        <!-- Modal -->
        @foreach($posts as $index => $b)
            <div id="myModal{{$index}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ $b->titulo }}</h4>
                        </div>
                        <div class="modal-body">
                            <img src="{{asset('img/'.$b->imagen)}}" width="80%" height="80%" />
                            <p>{{ $b->contenido }}.</p>
                            <p>{{ $b->fecha_creacion }}.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
