<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Business Casual Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{asset('css/business-casual.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>

<body>

    <div class="brand">Business Casual</div>
    <div class="address-bar">The Plaza | 5483 Start Bootstrap Ave. | Beverly Hills, California 26892 | 555.519.2013</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="business-casual.blade.php">Business Casual</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('home')}}">Home</a>
                    </li>
                    <li><a href="{{route('about')}}">About</a>
                    </li>
                    <li><a href="{{route('blog')}}">Blog</a>
                    </li>
                    <li><a href="{{route('contact')}}">Contact</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
{{--                        <li><a href="{{route('admin.blog')}}">Admin Blog</a>--}}
{{--                        </li>--}}
                        <li class="dropdown show">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admin
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="btn dropdown-item" href="{{route('admin.blog')}}">Blog</a>
                                <a class="btn dropdown-item" href="{{route('admin.about')}}">About</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        @yield('content')example

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{asset('js/jquery-1.10.2.js')}}"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>--}}

    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/business-casual.js')}}"></script>



    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.about') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'job', name: 'job'},
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#aboutCreate').click(function () {
                $('#saveBtn').val("create-about");
                $('#id').val('');
                $('#aboutForm').trigger("reset");
                $('#modelHeading').html("Create new");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.editJob', function () {
                var id = $(this).data('id');
                $.get("/about/edit/"+id, function (data) {
                    $('#modelHeading').html("Edit Job");
                    $('#saveBtn').val("edit-job");
                    $('#ajaxModel').modal('show');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#job').val(data.job);
                    $('#image').val(data.image);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Save');

                $.ajax({
                    data: $('#aboutForm').serialize(),
                    url: "{{ route('about.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#aboutForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deleteJob', function () {
                var id = $(this).data("id");
                $confirm = confirm("Are You sure want to delete !");
                if($confirm == true ){
                    $.ajax({
                        type: "DELETE",
                        url: "/about/delete/"+id,
                        success: function (data) {
                            table.draw();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });

            $('#btnContact').click(function (e) {
                $.ajax({
                    data: $('#contactForm').serialize(),
                    url: "{{ route('contactNew') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#aboutForm').trigger("reset");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

        });




    </script>


    <script>
    // Activates the Carousel
    $('.carousel').carousel({
        interval: 5000
    })
    </script>
    <script src="https://kit.fontawesome.com/422594322a.js" crossorigin="anonymous"></script>
</body>

</html>
