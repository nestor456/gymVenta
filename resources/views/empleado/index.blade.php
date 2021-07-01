@extends('layouts.menu')

@section('content')
<div class="container-fluid" >

    @if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
    @endif 
    
    <div class="row">
        <div class="col-xl-12">
            <a href="{{ url('empleado/create') }}" class="btn btn-success">Resgitrar nuevo empleado</a>
    <br><br>

    <form class="form-inline" action="{{ url('/empleado') }}" method="GET">
        <input class="form-control mr-sm-2" name="texto" value="{{$texto}}" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <br>
    
   <table class="table table-striped table-dark">
       <thead class="thead-light">
           <tr>
               <th class="text-center">DNI</th>
               <th class="text-center">Nombre</th>
               <th class="text-center">A.Paterno</th>
               <th class="text-center">A.Materno</th>
               <th class="text-center">Area</th>
               <th class="text-center">Acciones</th>
           </tr>
       </thead>
       <tbody>
           @foreach($empleados as $empleado )              
           <tr>
               <td class="text-center">{{ $empleado->dni }}</td>
               <td class="text-center">{{ $empleado->Nombre }}</td>
               <td class="text-center">{{ $empleado->ApellidoPaterno }}</td>
               <td class="text-center">{{ $empleado->ApellidoMaterno }}</td>
               <td class="text-center">{{ $empleado->Area }}</td>
               <td>
                   <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                       Editar
                    </a>
                    | 
                   
                <form action="{{ url('/empleado/'.$empleado->id ) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar"> 
                </form>
               </td>
           </tr>
            @endforeach
       </tbody>
   </table>
        </div>
    </div>

</div>
@endsection