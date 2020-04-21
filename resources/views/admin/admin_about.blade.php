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
                    <h2 class="intro-text text-center">Pagina de administrador About
                    </h2>
                    <hr>
                </div>

                <div class="col-lg-12">
                    <a id="aboutCreate" href="{{ route('about.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New</a>
                </div>

                <table id="table" class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>name</th>
                            <th>job</th>
                            <th>image</th>
                            <th width="300px">Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                    <div class="modal fade" id="ajaxModel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modelHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="aboutForm" name="aboutorm" class="form-horizontal">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Job</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="job" name="job" placeholder="Job" value="" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="image" name="image" placeholder="Image" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="saveBtn" value="New">Save changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>



    @endsection


