@extends('layouts.menu')

@section('content')

<div class="container">
    <form action="{{ url('/cliente')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('cliente.form',['modo'=>'Create'])
    </form>
</div>
@endsection