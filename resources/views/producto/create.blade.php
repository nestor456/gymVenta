@extends('layouts.menu')

@section('content')
<div class="container">

    <form action="{{ url('/producto')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('producto.form',['modo'=>'Create'])
    </form>

</div>
@endsection