@extends('business-casual.business-casual')

    @section('content')

    <div class="row">
        <div class="box">
            <div class="col-md-12">
                <h3></h3>

                <form action="" method="post">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class='form-control' type="text">
                    </div>
                    <div class="form-group">
                        <label>Puesto</label>
                        <input class='form-control' type="text">
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input class='form-control' type="text">
                    </div>
                    
                    <a href="{{route('admin.about')}}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i>
                        Return
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Save
                    </button>
                </form>
            </div>
        </div>

    </div>

    @endsection
