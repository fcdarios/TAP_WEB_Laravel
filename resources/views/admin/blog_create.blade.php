@extends('business-casual')

    @section('content')

    <div class="row">
        <div class="box">
            <div class="col-md-12">
                <h3></h3>
                {!! Form::open(['url' => 'admin/store', 'method' => 'post']) !!}
                <div class="form-group">
                    {{Form::label('titulo', 'Titulo')}}
                    {{Form::text('titulo', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contenido', 'Content')}}
                    {{Form::textarea('contenido', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('autor', 'Autor')}}
                    {{Form::text('autor', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('imagen', 'Imagen')}}
                    {{Form::select('imagen', ['slide-1.jpg' => 'slide-1', 'slide-2.jpg' => 'slide-2', 'slide-3.jpg' => 'slide-3'])}}
                </div>

                <a href="{{route('admin.blog')}}" class="btn btn-default">
                    <i class="fas fa-arrow-left"></i>
                    Return
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Save
                </button>


                {!! Form::close() !!}
            </div>
        </div>

    </div>

    @endsection
