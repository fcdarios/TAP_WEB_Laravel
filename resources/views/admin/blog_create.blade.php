@extends('business-casual')

    @section('content')

    <div class="row">
        <div class="box">
            <div class="col-md-12">
                <h3></h3>
                {!! Form::open(['url' => 'admin/store', 'method' => 'put']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Titulo')}}
                    {{Form::text('title', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('content', 'Content')}}
                    {{Form::textarea('content', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('content', 'Content')}}
                    {{Form::select('size', ['slide-1.jpg' => 'slide-1', 'slide-2.jpg' => 'slide-2', 'slide-3.jpg' => 'slide-3'])}}
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
