@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="row">
    <div class="col-xl-12">
        <a href="{{ url('membresia/create') }}" class="btn btn-success">Resgitrar nueva Membresia</a>
        <br><br>
        <table class="table table-dark">
            <thead>
                <th>#</th>
                <th class="text-center">Nombre</th>
            </thead>
            <tbody>
                @foreach($membresias as $membresia)                   
                <tr>
                    <td>{{ $membresia->id }}</td>
                    <td class="text-center">{{ $membresia->NombreMembresia }}</td>
                    <td><a href="{{ url('/membresia/'.$membresia->id.'/edit') }}" class="btn btn-warning">
                        Editar
                     </a> | 
                     <form action="{{ url('/membresia/'.$membresia->id ) }}" class="d-inline" method="post">
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