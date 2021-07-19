@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="row">
    <div class="table-responsive col-xl-12">
        <a href="{{ url('venta/create') }}" class="btn btn-success">Resgitrar nueva Venta</a>
        <br><br>
        <table class="table table-striped table-hover">
            <thead>
                <th>Id</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                    
                    <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->sale_date }}</td>
                    <td>{{ $venta->total }}</td>
                    <td>{{ $venta->status }}</td>                   
                        <td>
                         <form action="{{ url('/venta/'.$venta->id ) }}" class="d-inline" method="post">
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