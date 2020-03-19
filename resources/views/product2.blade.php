@extends('main')

@section('content')
    <h1>Detalles de producto</h1>
<div><img src="{{asset('images/cel.jpg')}}" alt=""></div>
<div>
    <ul>
        <li>Producto: Celular samsung</li>
        <li>Precio: $3500</li>
        <li>Color: azul</li>
        <li>Existencia: 40</li>
    </ul>
</div>
@endsection
