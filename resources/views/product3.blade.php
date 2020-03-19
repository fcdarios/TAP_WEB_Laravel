@extends('main')

@section('content')
    <h1>Detalles de producto</h1>
<div><img src="{{asset('images/tele.jpg')}}" alt=""></div>
<div>
    <ul>
        <li>Producto: tele</li>
        <li>Precio: $7000</li>
        <li>Color: negro</li>
        <li>Existencia: 10</li>
    </ul>
</div>
@endsection
