@extends('layouts.menu')

@section('content')

<div class="container">
    <form action="{{ url('/membresia')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('membresia.form',['modo'=>'Create'])
    </form>
</div>
@endsection