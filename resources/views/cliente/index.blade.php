@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="row">
    <div class="col-xl-12">
        <a href="{{ url('cliente/create') }}" class="btn btn-success">Resgitrar nueva Cliente</a>
        <br><br>
        <table class="table table-striped table-hover">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>A.Paterno</th>
                <th>A.Materno</th>
                <th>dni</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Plan contratado</th>
                <th>Promocion</th>
                <th>Entrenador</th>
                <th>Objetivo fisico</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    
                    <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->Nombre }}</td>
                    <td>{{ $cliente->ApellidoPaterno }}</td>
                    <td>{{ $cliente->ApellidoMaterno }}</td>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->Telefono }}</td>
                    <td>{{ $cliente->Correo }}</td>
                    <td>{{ $cliente->Plan_contratado }}</td>
                    <td>{{ $cliente->Promocion }}</td>
                    <td>{{ $cliente->Entrenador }}</td>
                    <td>{{ $cliente->Objetivo_fisico }}</td>
                    <td>{{ $cliente->Fecha_Inicio }}</td>
                    <td>{{ $cliente->Fecha_Final }}</td>                        
                        <td><a href="{{ url('/cliente/'.$cliente->id.'/edit') }}" class="btn btn-warning">
                            Editar
                         </a> | 
                         <form action="{{ url('/cliente/'.$cliente->id ) }}" class="d-inline" method="post">
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