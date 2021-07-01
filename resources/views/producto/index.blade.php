@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="row">
    <div class="col-xl-12">
        <a href="{{ url('producto/create') }}" class="btn btn-success">Resgitrar nueva Producto</a>
        <br><br>
        <table class="table table-dark">
            <thead>
                <th class="text-center">Nombre Producto</th>
                <th class="text-center">Detalle</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Precio</th>
            </thead>
            <tbody>
                @foreach($productos as $producto)                   
                <tr>
                    <td class="text-center">{{ $producto->NombreProducto }}</td>
                    <td class="text-center">{{ $producto->Detalle }}</td>
                    <td class="text-center">{{ $producto->Stock }}</td>
                    <td class="text-center">{{ $producto->Precio }}</td>

                    <td><a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">
                        Editar
                     </a> | 
                     <form action="{{ url('/producto/'.$producto->id ) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                    </form></td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection