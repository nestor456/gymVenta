@extends('layouts.menu')

@section('content')

<div class="container">
    <form action="{{ url('/area/'.$area->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('area.form',['modo'=>'Editar'])
    </form>
</div>
@endsection