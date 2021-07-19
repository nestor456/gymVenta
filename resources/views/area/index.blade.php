@extends('layouts.menu')

@section('content')
<div class="container-fluid" >
<div class="row">
    <div class="col-xl-12 table-responsive">
        <a href="{{ url('area/create') }}" class="btn btn-success">Resgitrar nueva Area</a>
        <br><br>
        <table class="table table-dark">
            <thead>
                <th>#</th>
                <th class="text-center">Nombre</th>
            </thead>
            <tbody>
                @foreach($areas as $area)                   
                <tr>
                    <td>{{ $area->id }}</td>
                    <td class="text-center">{{ $area->Nombre }}</td>
                    <td><a href="{{ url('/area/'.$area->id.'/edit') }}" class="btn btn-warning">
                        Editar
                     </a> | 
                     <form action="{{ url('/area/'.$area->id ) }}" class="d-inline" method="post">
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