@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="row">
    <div class="table-responsive col-xl-12">
        <a href="{{ url('venta/create') }}" class="btn btn-success">Resgitrar nueva Venta</a>
        <br><br>
        
        <form class="form-inline" action="{{ url('/venta') }}" method="GET">
            <input class="form-control mr-sm-2" name="texto" value="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

        <br><br>
        <table class="table table-striped table-hover">
            <thead>
                <th>Id</th>
                <th>Nombre y Apellidos</th>
                <th>DNI</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                    
                    <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->cliente->Nombre }} {{ $venta->cliente->ApellidoPaterno }} {{ $venta->cliente->ApellidoMaterno }}</td>
                    <td>{{ $venta->cliente->dni }}</td>
                    <td>{{ $venta->sale_date }}</td>
                    <td>{{ $venta->total }}</td>
                    <td>{{ $venta->status }}</td>                  
                    <td>
                         <form action="{{ url('/venta/'.$venta->id ) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                        </form>
                    |
                    <a href="{{route('venta.pdf', $venta) }}" type="button" class="btn btn-primary boton" >Imprimir</a></td>
                    </tr>
                @endforeach                
            </tbody>
        </table>
        
    </div>
</div>
</div>

@endsection