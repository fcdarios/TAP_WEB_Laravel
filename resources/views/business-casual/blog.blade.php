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
