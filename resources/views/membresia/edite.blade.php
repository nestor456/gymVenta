@extends('layouts.menu')

@section('content')

<div class="container">
    <form action="{{ url('/membresia/'.$membresia->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('membresia.form',['modo'=>'Editar'])
    </form>
</div>
@endsection