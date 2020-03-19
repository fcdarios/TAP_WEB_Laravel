@extends('main')

@section('content')
    <h1>Detalles de producto</h1>
<div><img src="{{asset('images/b1.jpg')}}" alt=""></div>
<div>
    <ul>
        <li>Producto: Bicicleta</li>
        <li>Precio: $2500</li>
        <li>Color: Verde</li>
        <li>Existencia: 30</li>
    </ul>
</div>
@endsection
