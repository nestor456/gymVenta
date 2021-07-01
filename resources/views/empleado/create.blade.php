@extends('layouts.menu')

@section('content')
<div class="container">
    <form action="{{ url('/empleado')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('empleado.form',['modo'=>'Create'])
    </form>

</div>
@endsection