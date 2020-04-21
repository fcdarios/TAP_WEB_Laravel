@extends('business_casual');
@section('container');
<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">About <strong>business casual</strong>
            </h2>
            <hr>
        </div>
        <div class="col-md-12">
            <a class="btn btn-primary btnnew"><i class="fas fa-plus"></i> New</a>
            <table class="table table-hover" id="work_team_table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Fotografía</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
              </table>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var table = $("#work_team_table").DataTable({
            serverSide: true,
            ajax: "{{ route('adminWorkTeamShow') }}",
            columns: [
                { name: 'id_team', orderable: false, searchable:false},
                { name: 'name' },
                { name: 'job' },
                { name: 'photo' },
                { name: 'acciones', orderable: false, searchable:false},
            ],
        });

        $('.btnnew').on('click', function(){
            Swal.fire({
                title: 'Creación de un nuevo integrante',
                html:
                    '<label>Nombre: </label><input id="name" class="swal2-input">' +
                    '<label>Puesto de trabajo: </label><input id="job" class="swal2-input">' +
                    '<label>Fotografía: </label><input id="photo" class="swal2-input">',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "Guardar",
                cancelButtonText: "Cancelar"}).then(
                    (result) => {
                        if(result.value) {
                            var name = $("#name").val();
                            var job = $("#job").val();
                            var photo = $("#photo").val();
                            $.ajax({
                                type: 'POST',
                                url: '{{route('adminWorkTeamCreate')}}',
                                data: {name:name, job:job, photo:photo},
                                success: function(data){   
                                    Swal.fire(
                                        'Guardado',
                                        data.success,
                                        'success'
                                    ).then((result) => {
                                        location.reload()
                                    })
                                }
                            });
                        }
                    }
                )
            
        });


        $("#work_team_table tbody").on('click', '.btnshow', function(){
            var work = table.row($(this).parents('tr')).data();
            Swal.fire({
                title: work[1],
                text: work[2],
                imageUrl: '{{asset('img/')}}/'+work[3],
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Representante',
            });
        });

        $("#work_team_table tbody").on('click', '.btnupdate', function(){
            var work = table.row($(this).parents('tr')).data();
            Swal.fire({
                title: 'Edición de un nuevo integrante',
                html:
                    '<label>Nombre: </label><input id="name" value="'+work[1]+'" class="swal2-input">' +
                    '<label>Puesto de trabajo: </label><input id="job"  value="'+work[2]+'" class="swal2-input">' +
                    '<label>Fotografía: </label><input id="photo"  value="'+work[3]+'" class="swal2-input">',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "Guardar",
                cancelButtonText: "Cancelar"}).then(
                    (result) => {
                        if(result.value) {
                            var name = $("#name").val();
                            var job = $("#job").val();
                            var photo = $("#photo").val();
                            $.ajax({
                                type: 'POST',
                                url: '{{route('adminWorkTeamUpdate')}}',
                                data: {id:work[0], name:name, job:job, photo:photo},
                                success: function(data){   
                                    Swal.fire(
                                        'Guardado',
                                        data.success,
                                        'success'
                                    ).then((result) => {
                                        location.reload()
                                    })
                                }
                            });
                        }
                    }
                )
        });

        $("#work_team_table tbody").on('click', '.btndelete', function(){
            var work = table.row($(this).parents('tr')).data();
            Swal.fire({
                title: '¿Deseas eliminarlo?',
                text: "Esta acción no es reversible",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: '{{route('adminWorkTeamDelete')}}',
                            data: {id:work[0]},
                            success: function(data){   
                                Swal.fire(
                                    'Eliminado',
                                    '¡Se ha borrado con éxito!',
                                    'success'
                                ).then((result) => {
                                    location.reload()
                                })
                            }
                        });
                    }
                })
        });
    });
</script>
@endsection('container');
