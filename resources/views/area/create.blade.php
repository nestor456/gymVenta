@extends('layouts.menu')

@section('content')

<div class="container">
    <form action="{{ url('/area')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('area.form',['modo'=>'Create'])
    </form>
</div>
@endsection